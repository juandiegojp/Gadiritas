<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
    private $apiContext;
    private $clientId = 'AYtrdrOPDgbeTcq0_WtTeMEeIrZK_ZUohON-OKuBWs3zeEmcb2RDOWm4YxGQrRfwzjBOCGVHml2HUiY9';
    private $clientSecret = 'EJUXmawST1zgv_SQIjuCCaG2lyCVk4-rkYdZtea_4bcGs0FC-XBJLxdNgkW1C7ndifgYZDCgUFveeeGZ';

    public function __construct()
    {
        $this->middleware('auth');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $this->clientId,
                $this->clientSecret
            )
        );
        $this->apiContext->setConfig(
            array(
                'mode' => 'sandbox',
                'log.LogEnabled' => true,
                'log.FileName' => storage_path('logs/paypal.log'),
                'log.LogLevel' => 'DEBUG',
                'cache.enabled' => true,
            )
        );
    }

    public function checkout(Request $request)
    {
        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($request->input('amount'));

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription('Compra de productos en mi sitio web');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.success'))
            ->setCancelUrl(route('paypal.cancel'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
            $approvalUrl = $payment->getApprovalLink();

            $reserva = new ReservaController();
            $reserva->crear_reserva($request);

            return redirect($approvalUrl);
        } catch (Exception $ex) {
            Log::error($ex);

            return redirect()->route('usuarios.index')->with('error', '¡Oh, no! Algo ha salido mal en el proceso...');
        }
    }

    public function success(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);

            if ($result->getState() == 'approved') {
                // El pago ha sido aprobado, realiza las acciones necesarias aquí
                return redirect()->route('usuarios.index')->with('success', '¡La reserva se ha creado correctamente!');
            } else {
                return redirect()->route('usuarios.index')->with('error', '¡Oh, no! Algo ha salido mal en el proceso...');
            }
        } catch (Exception $ex) {
            Log::error($ex);

            return redirect()->route('usuarios.index')->with('error', '¡Oh, no! Algo ha salido mal en el proceso...');
        }
    }

    public function cancel()
    {
        redirect()->back();
    }

    public function error()
    {
        redirect()->back();
    }
}

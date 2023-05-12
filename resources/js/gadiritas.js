$(document).ready(function () {
    var precioActividad;
    var numPersonas;
    var precioTotal;

    let datepickerOriginal = $("#date");
    let divFecha = $("#divFecha");
    let originalValue = datepickerOriginal[0].value;

    disponibilidad();

    function showPrecioTotal() {
        let precioCalculado = numPersonas * precioActividad;
        precioTotal.innerText = precioCalculado + "€";
        let amountInput = document.querySelector('input[name="amount"]');
        amountInput.setAttribute("value", precioCalculado);
    }

    function disponibilidad() {
        let date = datepickerOriginal.val().replaceAll("/", "-");
        let hora = $("#hora").val();
        let act_id = $("#act_id").val();

        //console.log(date);
        //console.log(hora);
        //console.log(act_id);

        $("#n_personas").empty();

        $.ajax({
            url: "/actividad/check",
            data: {
                hora: hora,
                date: date,
                act_id: act_id,
            },
            type: "POST",
            dataType: "json",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: (data) => {
                //console.log(data.status);
                let cont = data.status.length;
                const value = data.status;

                for (let index = 0; index < cont; index++) {
                    if (index == 0) {
                        $("#n_personas").append(
                            `<option value=${value[index]} selected>${value[index]}</option>`
                        );
                    } else {
                        $("#n_personas").append(
                            `<option value=${value[index]}>${value[index]}</option>`
                        );
                    }
                }
                precioActividad = document.getElementById("precioAct").value;
                numPersonas = document.getElementById("n_personas").value;
                precioTotal = document.getElementById("precioTotal");
                console.log(precioActividad + "€");
                console.log(numPersonas + " personas");
                console.log(precioTotal);
                showPrecioTotal();
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    $("#hora").change(function () {
        console.log("hora cambiada.");
        disponibilidad();
    });

    $("#n_personas").change(function () {
        console.log("Personas console.log");
        numPersonas = document.getElementById("n_personas").value;
        showPrecioTotal();
    });

    divFecha[0].addEventListener("click", () => {
        console.log("fecha cambiada.");
        if (datepickerOriginal.value !== originalValue) {
            disponibilidad();
        }
    });
});

$(function () {
    // Cuando se hace clic en el botón "Editar"
    $("#comentarios").on("click", ".editar", function () {
        // Obtener el ID del comentario que se está editando
        var comentarioID = $(this).closest(".comentario").data("comentario-id");
        console.log(comentarioID);

        // Obtener el contenido actual del comentario
        var contenidoActual = $(this).siblings(".contenido").text();
        console.log(contenidoActual);

        // Reemplazar el contenido actual del comentario con un formulario de edición
        $(this).siblings(".contenido").hide();
        $(this).siblings(".autor").hide();
        $(".editar").hide();

        $(this).siblings(".formComentario").removeAttr("hidden");
        $("body").on("click", function (e) {
            // Si el clic no ocurrió dentro del área de comentarios
            if (!$(e.target).closest("#comentarios").length) {
                // Volver a mostrar el contenido del comentario y ocultar el formulario de edición
                $(".contenido").show();
                $(".autor").show();
                $(".editar").show();
                $(".formComentario").attr("hidden", "");
            }
        });
    });
});

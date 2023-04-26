$(document).ready(function () {
    function disponibilidad() {
        let date = datepickerOriginal.val().replaceAll("/", "-");
        let hora = $("#hora").val();

        $.ajax({
            url: `/actividad/check`,
            data: {
                _token: $("meta[name='csrf-token']").attr("content"),
                hora: hora,
                date: date,
            },
            type: "POST",
            dataType: "json",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
            success: (data) => {
                console.log(data);
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

    let datepickerOriginal = $("#date");
    let divFecha = $("#divFecha");
    let originalValue = datepickerOriginal[0].value;

    divFecha[0].addEventListener("click", () => {
        console.log("fecha cambiada.");
        if (datepickerOriginal.value !== originalValue) {
            disponibilidad();
        }
    });
});

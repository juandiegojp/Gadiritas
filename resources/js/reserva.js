$(document).ready(function () {
    function getCookie(name) {
        let cookieValue = null;
        if (document.cookie && document.cookie !== "") {
            const cookies = document.cookie.split(";");
            for (const element of cookies) {
                const cookie = element.trim();
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) === name + "=") {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
                }
            }
        }
        return cookieValue;
    }

    function disponibilidad() {
        let date = datepickerOriginal.val().replaceAll("/","-");
        let hora = $("#hora").val();



        $.ajax({
            url: `/actividad/check`,
            data: {
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            type: "POST",
            dataType: "json",
            data: JSON.stringify({
                hora: hora,
                date: date
            }),
            headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRFToken": getCookie("XSRF-TOKEN"),
            },
            success: (data) => {
                console.log(data);
            },
            error: (error) => {
            console.log(error);
            }
        });
    }

    $("#hora").change(function () {
        console.log("hora cambiada.")
        disponibilidad();
    });


    let datepickerOriginal = $("#date");
    let divFecha = $("#divFecha");
    let originalValue = datepickerOriginal[0].value;


    divFecha[0].addEventListener("click", () => {
        console.log("fecha cambiada.")
        if (datepickerOriginal.value !== originalValue) {
            disponibilidad();
        }
    });
});

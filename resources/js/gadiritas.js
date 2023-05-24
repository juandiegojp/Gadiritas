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
                //console.log(precioActividad + "€");
                //console.log(numPersonas + " personas");
                //console.log(precioTotal);
                showPrecioTotal();
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    $("#hora").change(function () {
        //console.log("hora cambiada.");
        disponibilidad();
    });

    $("#n_personas").change(function () {
        //console.log("Personas console.log");
        numPersonas = document.getElementById("n_personas").value;
        showPrecioTotal();
    });

    divFecha[0].addEventListener("click", () => {
        //console.log("fecha cambiada.");
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
        //console.log(comentarioID);

        // Obtener el contenido actual del comentario
        var contenidoActual = $(this).siblings(".contenido").text();
        //console.log(contenidoActual);

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

$(function () {
    $("#comentarioForm").submit(function (e) {
        e.preventDefault(); // Evitar el envío tradicional del formulario

        // Obtener los datos del formulario
        var actividadId = $("#act_id").val();
        var contenido = $("#contenido").val();
        console.log(actividadId);
        console.log(contenido);

        // Crear el objeto de datos para enviar a través de AJAX
        var data = {
            actividadId: actividadId,
            contenido: contenido,
        };

        // Realizar la solicitud AJAX
        $.ajax({
            url: `/detalles/${actividadId}/comment`,
            type: "POST",
            data: data,
            dataType: "json",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);

                // Crear el HTML para el nuevo comentario
                var nuevoComentarioHTML = `
                <div class="comentario" data-comentario-id="">
                    <figcaption class="autor">
                        <div>
                            <cite>${response.nombre} ${response.apellidos}</cite>
                        </div>
                    </figcaption>
                    <p class="contenido">${response.status.contenido}</p>
                </div>
                `;

                // Agregar el nuevo comentario al contenedor de comentarios
                $("#comentarios").append(nuevoComentarioHTML);

                // Restablecer el formulario
                $("#contenido").val(""); // Limpiar el campo de contenido

                // Aquí puedes realizar cualquier otra acción adicional, como mostrar un mensaje de éxito, actualizar la cantidad de comentarios, etc.
            },
            error: function (xhr, status, error) {
                // Manejar los errores de la solicitud AJAX
                console.log(error);
            },
        });
    });
});

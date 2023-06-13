/**
 * Esta función es para comprobar la disponibilidad del nº de personas
 * según el día y hora seleccionado.
 */
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

/**
 * Muestra el editar el comentario y borrar.
 */
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

/**
 * Creación del comentario por AJAX.
 */
$(function () {
    $("#comentarioForm").submit(function (e) {
        e.preventDefault(); // Evitar el envío tradicional del formulario

        // Obtener los datos del formulario
        var actividadId = $("#act_id").val();
        var contenido = $("#contenido").val();
        var positivo = $("#positivo").val();
        var negativo = $("#negativo").val();
        //console.log(actividadId);
        //console.log(contenido);

        var valoracionPositiva = document.getElementById("positivo").value;
        var valoracionNegativa = document.getElementById("negativo").value;

        if (valoracionPositiva === "" && valoracionNegativa === "") {
            alert(
                "Debes seleccionar una valoración (positiva o negativa) antes de enviar el comentario."
            );
            return false;
        }

        // Crear el objeto de datos para enviar a través de AJAX
        var data = {
            actividadId: actividadId,
            contenido: contenido,
            positivo: positivo,
            negativo: negativo,
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
                //console.log(response);

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
                $("#comentarios").prepend(nuevoComentarioHTML);

                // Restablecer el formulario
                $("#contenido").val(""); // Limpiar el campo de contenido

                var btnPositivo = document.getElementById("btnPositivo");
                var btnNegativo = document.getElementById("btnNegativo");
                btnPositivo.style.backgroundColor = "";
                btnNegativo.style.backgroundColor = "";

                var valoracionPositiva = document.getElementById("positivo");
                var valoracionNegativa = document.getElementById("negativo");
                valoracionPositiva.value = "";
                valoracionNegativa.value = "";
            },
            error: function (xhr, status, error) {
                // Manejar los errores de la solicitud AJAX
                console.log(error);
            },
        });
    });
});

/**
 * Esta función hace el borrado o editar el comentario mediante
 * AJAX.
 */
$(function () {
    $(".comentario").on("submit", function (e) {
        e.preventDefault(); // Evitar el envío tradicional del formulario

        var formulario = $(this); // Obtener el formulario actual

        // Verificar si el formulario se envió desde el botón "borrarComentario"
        if (formulario.find("#borrarComentario:focus").length > 0) {
            // Obtener los datos del formulario
            var comentarioId = formulario.find("#comentarioID").val();

            // Crear el objeto de datos para enviar a través de AJAX
            var data = {
                comentarioId: comentarioId,
            };

            // Realizar la solicitud AJAX
            $.ajax({
                url: "/comentarios/delete",
                type: "POST",
                data: data,
                dataType: "json",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    // Manejar la respuesta del servidor
                    //console.log(response);
                    formulario.closest(".comentario").remove();
                },
                error: function (xhr, status, error) {
                    // Manejar los errores de la solicitud AJAX
                    console.log(error);
                },
            });
        }

        // Verificar si el formulario se envió desde el botón "editarComentario"
        if (formulario.find("#editarComentario:focus").length > 0) {
            // Obtener los datos del formulario
            var comentarioId = formulario.find("#comentarioID").val();
            var comentarioData = formulario.find("#contenido").val();

            // Crear el objeto de datos para enviar a través de AJAX
            var data = {
                comentarioId: comentarioId,
                comentarioData: comentarioData,
            };

            // Realizar la solicitud AJAX
            $.ajax({
                url: `/comentarios/${comentarioId}`,
                type: "PUT",
                data: data,
                dataType: "json",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    // Manejar la respuesta del servidor
                    //console.log(response);
                    formulario
                        .find(".contenido")
                        .text(response.status.contenido);

                    $(".contenido").show();
                    $(".autor").show();
                    $(".editar").show();
                    $(".formComentario").attr("hidden", "");
                },
                error: function (xhr, status, error) {
                    // Manejar los errores de la solicitud AJAX
                    console.log(error);
                },
            });
        }
    });
});

/**
 * Añade el valor en el input hidden si el comentario es positivo
 * o negativo.
 * @param {*} opcion
 */
function valorar(opcion) {
    var btnPositivo = document.getElementById("btnPositivo");
    var btnNegativo = document.getElementById("btnNegativo");
    var valoracionPInput = document.getElementById("positivo");
    var valoracionNInput = document.getElementById("negativo");

    if (opcion === "positivo") {
        btnPositivo.style.backgroundColor = "green";
        btnNegativo.style.backgroundColor = "";
        valoracionPInput.value = "1"; // Asignar el string "true"
        valoracionNInput.value = "0"; // Restaurar el valor vacío
    } else if (opcion === "negativo") {
        btnPositivo.style.backgroundColor = "";
        btnNegativo.style.backgroundColor = "red";
        valoracionPInput.value = "0"; // Restaurar el valor vacío
        valoracionNInput.value = "1"; // Asignar el string "true"
    }
}

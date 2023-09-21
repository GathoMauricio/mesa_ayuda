require("./bootstrap");
import axios from "axios";
window.Vue = require("vue").default;

$(document).ready(function () {
    // alertify.confirm(
    //     "Confirm Title",
    //     "Confirm Message",
    //     function () {
    //         alertify.success("Ok");
    //     },
    //     function () {
    //         alertify.error("Cancel");
    //     }
    // );
});

window.cargarCategorias = (value) => {
    if (value.length > 0) {
        $("#cbo_categoria").html(``);
        axios
            .get("api/cargar_categorias/" + value)
            .then((response) => {
                let opciones = `<option value>--Seleccione la categoría--</option>`;
                $.each(response.data, (index, item) => {
                    opciones += `<option value="${item.id}">${item.categoria}</option>`;
                });
                $("#cbo_categoria").html(opciones);
                $("#cbo_sintoma").html(
                    `<option value>--Seleccione la categoría--</option>`
                );
            })
            .catch((error) => {
                //console.log(error);
            });
    } else {
        $("#cbo_categoria").html(
            `<option value>--Seleccione la categoría--</option>`
        );
        $("#cbo_sintoma").html(
            `<option value>--Seleccione el síntoma--</option>`
        );
    }
};
window.cargarSintomas = (value) => {
    if (value.length > 0) {
        $("#cbo_sintoma").html(``);
        axios
            .get("api/cargar_sintomas/" + value)
            .then((response) => {
                let opciones = `<option value>--Seleccione el sintoma--</option>`;
                $.each(response.data, (index, item) => {
                    opciones += `<option value="${item.id}">${item.sintoma}</option>`;
                });
                $("#cbo_sintoma").html(opciones);
            })
            .catch((error) => {
                //console.log(error);
            });
    } else {
        $("#cbo_sintoma").html(
            `<option value>--Seleccione el síntoma--</option>`
        );
    }
};

window.eliminarCliente = (cliente_id) => {
    console.log("confirm");
    alertify.confirm(
        "¿Eliminar Cliente?",
        "Si elimina este cliente también se eliminarán los registros ligados a este tales como Empleados, Tickets y sus Seguimientos.\n¿Realmente desea eliminar todo?",
        function () {
            $("#form_eliminar_cliente_" + cliente_id).submit();
        },
        function () {
            //alertify.error("Cancel");
        }
    );
};

window.eliminarEmpleado = (empleado_id) => {
    console.log("confirm");
    alertify.confirm(
        "¿Eliminar Empleado??",
        "Si elimina este empleado también se eliminarán los registros ligados a este tales como Tickets y sus Seguimientos.\n¿Realmente desea eliminar todo?",
        function () {
            $("#form_eliminar_empleado_" + empleado_id).submit();
        },
        function () {
            //alertify.error("Cancel");
        }
    );
};

window.eliminarArea = (id) => {
    console.log("confirm");
    alertify.confirm(
        "¿Eliminar?",
        "¿Realmente desea eliminar el registro?",
        function () {
            $("#form_eliminar_area_" + id).submit();
        },
        function () {
            //alertify.error("Cancel");
        }
    );
};
window.eliminarCategoria = (id) => {
    console.log("confirm");
    alertify.confirm(
        "¿Eliminar?",
        "¿Realmente desea eliminar el registro?",
        function () {
            $("#form_eliminar_categoria_" + id).submit();
        },
        function () {
            //alertify.error("Cancel");
        }
    );
};
window.eliminarSintoma = (id) => {
    console.log("confirm");
    alertify.confirm(
        "¿Eliminar?",
        "¿Realmente desea eliminar el registro?",
        function () {
            $("#form_eliminar_sintoma_" + id).submit();
        },
        function () {
            //alertify.error("Cancel");
        }
    );
};
let contadorArchivosTicket = 0;
window.adjuntarArchivo = () => {
    contadorArchivosTicket++;
    if (contadorArchivosTicket > 0) {
        $("#alerta_no_archivos").css("display", "none");
    }
    $("#contenedor_archivos").append(`
    <div class="col-md-6" id="archivo_adjunto_ticket_${contadorArchivosTicket}">
        <a href="javascript:void(0)" onclick="removerInputArchivo(${contadorArchivosTicket})"
            class="float-right text-danger">X</a>
        <label class="font-weight-bold">Seleccione archivo</label>
        <input type="file" name="archivo[]" class="form-control" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" required>
    </div>
    `);
};

window.removerInputArchivo = (id) => {
    $("#archivo_adjunto_ticket_" + id).remove();
    contadorArchivosTicket--;
    if (contadorArchivosTicket <= 0) {
        $("#alerta_no_archivos").css("display", "block");
    }
};

window.descargarArchivoTicket = (id) => {
    console.log("form_descargar_archivo_ticket_" + id);
    $("#form_descargar_archivo_ticket_" + id).submit();
};

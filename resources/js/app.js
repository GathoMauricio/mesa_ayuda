require("./bootstrap");
import axios from "axios";
window.Vue = require("vue").default;

$(document).ready(function () {});

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

//Traveler
$("#cedula").keyup(function (e) {

    if ($("#cedula").val().length == 16) {

        let busqueda = new FormData(); //creando el FormData
        busqueda.busqueda = $("#cedula").val();

        let json = JSON.stringify(busqueda);

        //fetch("/api/paciente/busqueda",{method:"POST",body:busqueda}).then(response=>response.json()).then(data => {
        //console.log(data);
        //});
        console.log(busqueda);
        $.ajax({
            url: "/api/paciente/busqueda",
            type: "post",
            data: json
        }).done(function (response) {
            // console.log(consts)
            // console.log(response);
            // consts++;    
            console.log(response);
            if (response != null) {
                //Recuperar valor
                $("#nombre").val(response.nombre + " " + response.apellido);
                $("#paciente_id").val(response.id);

                //prueva 
                console.log(response.id);
                console.log($("#id_paciente"));

                //Inhabilitar elementos
                //console.log("Inhabilitar");
                $("#id_paciente").prop("disabled", true);
                $("#cedula").prop("disabled", true);
                $("#nombre").prop("disabled", true);

                //Focus
                $("#fecha_cita").focus();
            }
        });
    }

});

$("#TravelerCancelar").click(() => {
    if ($("#TravelerForm").attr("cancel") !== undefined) {
        window.location.href = "/traveler";
        console.log("attr cancel");
    } else {
        $("#cedula").removeAttr("disabled");
        $("#nombre").removeAttr("disabled");
    }

});

$(document).ready(() => {
    if ($("#TravelerForm").attr("cancel") !== undefined) {
        $("#id_paciente").prop("disabled", true);
        $("#cedula").prop("disabled", true);
        $("#nombre").prop("disabled", true);
    }
});
//End Traveler
$("#menu_lista").click(function () {
    //alert("se dia clic");

    if ($("#menu").hasClass("inline")) {
        $("#menu").removeClass("inline");
        $("#menu").addClass("online");
    } else {
        $("#menu").addClass("inline");
        $("#menu").removeClass("online");
    }

});

$("#servicio").click(function () {
    if ($("#servicio-item").hasClass("inline")) {
        $("#servicio-item").removeClass("inline");
        $("#servicio-item").addClass("online");
    } else {
        $("#servicio-item").removeClass("online");
        $("#servicio-item").addClass("inline");
    }
});

$("#usuario").click(function () {
    if ($("#usuario-item").hasClass("inline")) {
        $("#usuario-item").removeClass("inline");
        $("#usuario-item").addClass("online");
    } else {
        $("#usuario-item").removeClass("online");
        $("#usuario-item").addClass("inline");
    }
});

let i = 0;

$("#sider_desplegar").click(function () {
    $("#sider_menu_lateral").removeClass("side_nav");
    $("#sider_menu_lateral").addClass("side_nav_cara_position");
});

$("#sider_menu_lateral_ocultar").click(function () {
    $("#sider_menu_lateral").addClass("side_nav");
    $("#sider_menu_lateral").removeClass("side_nav_cara_position");
});

$(document).ready(function () {
    let size = $(window).width();
    //alert(size);
});
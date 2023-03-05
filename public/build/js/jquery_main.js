$("#menu_lista").click(function(){
    //alert("se dia clic");

    if($("#menu").hasClass("inline")){
        $("#menu").removeClass("inline");
        $("#menu").addClass("online");
    }else{
        $("#menu").addClass("inline");
        $("#menu").removeClass("online");
    }
    
});

$("#servicio").click(function(){
    if($("#servicio-item").hasClass("inline")){
        $("#servicio-item").removeClass("inline");
        $("#servicio-item").addClass("online");
    }else{
        $("#servicio-item").removeClass("online");
        $("#servicio-item").addClass("inline");
    }
});

$("#usuario").click(function(){
    if($("#usuario-item").hasClass("inline")){
        $("#usuario-item").removeClass("inline");
        $("#usuario-item").addClass("online");
    }else{
        $("#usuario-item").removeClass("online");
        $("#usuario-item").addClass("inline");
    }
});

let i=0;

$("#sider_desplegar").click(function(){
   $("#sider_menu_lateral").removeClass("side_nav");
   $("#sider_menu_lateral").addClass("side_nav_cara_position");
});

$("#sider_menu_lateral_ocultar").click(function(){
    $("#sider_menu_lateral").addClass("side_nav");
    $("#sider_menu_lateral").removeClass("side_nav_cara_position");
});

$(document).ready(function(){
    let size = $(window).width();
    alert(size);
});
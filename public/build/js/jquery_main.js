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

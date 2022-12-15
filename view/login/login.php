<div class="position-absolute top-50 start-50 translate-middle">
    <form id="login" method="post" >
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
        <input type="email" class="form-control" id="correo" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Nunca compartiremos tu correo electronico.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="clave">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Recordarme</label>
    </div>
    <div class="mb-3">
        <a href="#" class="link-primary">¿Olvidaste tu contraseña?</a>
        <a href="#" class="link-primary">¡Registrate!</a>
    </div>
    <button type="submit" class="btn btn-primary">Iniciar secion</button>
    </form>
    <script src="build/js/jquery.js"></script>
    <script>
        $("#login").submit(function(evento){
            evento.preventDefault();
            console.log("previniendo defoult");

            let post = new Object();
            post.correo=$("#correo").val();
            post.clave=$("#clave").val();

            let json= JSON.stringify(post);

            $.ajax({
                url:"/api/usuario",
                type:"post",
                data:json,
                datatype:"json"
            }).done(function(datos){
                //let rdatos=JSON.parse(datos);
                
                //alert(datos.correo);
                if(datos!=null){
                    console.log(datos.correo);
                    //alert("Secion iniciada");
                    //$("#secion").text(datos.correo);
                    //window.location.href="/home";
                }else{
                    alert("no se pudo iniciar secion");
                }
                
            });
        });
    </script>
</div>

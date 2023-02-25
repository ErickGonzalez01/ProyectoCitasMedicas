<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<div class="position-absolute top-50 start-50 translate-middle">
    <?php 
    if(isset($errores)){
        foreach($errores as $err){
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo $err;
            echo "</div>";
        }
    }
        
    ?>
    <form action="/registrate" method="post" >
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
        <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Nunca compartiremos tu correo electronico.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="clave1" name="clave1">
    </div>
    <div class="mb-3">
        <label class="form-label" for="pass2">Comprobar contraseña</label>
        <input type="password" class="form-control" id="clave2" name="clave2">        
    </div>
    <!--<div class="mb-3">
        <a href="#" class="link-primary">¿Olvidaste tu contraseña?</a>
        <a href="#" class="link-primary">¡Registrate!</a>
    </div>-->
    <button type="submit" class="btn btn-primary">Registrate</button>
    </form>    
</div>
</body>
</html>
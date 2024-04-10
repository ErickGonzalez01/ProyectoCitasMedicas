<div class="card p-3 mt-2 me-auto ms-auto" style="width: 40rem">
    <?php
    if (isset($errores)) {
        foreach ($errores as $err) {
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo $err;
            echo "</div>";
        }
    }
    if(isset($creado)){
        echo "<div class=\"alert alert-success\" role=\"alert\">";
        echo $creado;
        echo "</div>";
    }
    ?>
    <form action="/user/registrate" method="post">
        <div class="mb-1">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?=esc($post["nombre"]??"")?>">
        </div>
        <div class="mb-1">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="<?=esc($post["apellido"]??"")?>">
        </div>
        <div class="mb-1">
            <label for="exampleInputEmail1" class="form-label">Correo electronico:</label>
            <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" value="<?=esc($post["correo"]??"")?>">
            <div id="emailHelp" class="form-text">Nunca compartiremos tu correo electronico.</div>
        </div>
        <div class="mb-1">
            <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="clave1" name="clave1">
        </div>
        <div class="mb-1">
            <label class="form-label" for="pass2">Comprobar contraseña:</label>
            <input type="password" class="form-control" id="clave2" name="clave2">
        </div>

        <button type="submit" class="btn btn-primary">Registrate</button>
    </form>
</div>
<div>
    <?php
    if(isset($errores)){
        if($estado==false){
            foreach($errores as $err){
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                $err
            </div>";
            }
        }
        if($estado==true){
            foreach($errores as $err){
                echo "<div class=\"alert alert-primary\" role=\"alert\">
                $err
            </div>";
            }
        }
    }
    
    ?>
    <form class="row g-3" method="post" action="/paciente">
        <div class="col-md-4">
            <label for="exampleInputEmail1" class="form-label">Cedula:</label>
            <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp" value="<?php echo $post["cedula"] ?? "" ?>">
        </div>
        <div class="col-md-4">
            <label for="exampleInputPassword1" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="nombre" value="<?php echo $post["nombre"] ?? "" ?>">
        </div>
        <div class="col-md-4">
            <label for="exampleInputPassword1" class="form-label">Apellido:</label>
            <input type="text" class="form-control" id="Apelldo" name="apellido" value="<?php echo $post["apellido"] ?? "" ?>">
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento:</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $post["fecha_nacimiento"] ?? "" ?>">
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1" class="form-label">Telefono:</label>
            <input type="phone" class="form-control" id="telefono" name="telefono" value="<?php echo $post["telefono"] ?? "" ?>">
        </div>
        <div class="d-inline-flex p-2 bd-highlight">
            <button type="submit" class="btn btn-primary">Guardar paciente</button>
        </div>
        

    </form>
</div>
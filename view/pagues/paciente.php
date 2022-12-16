<div class="container">
    <?php 
        if(isset($alerta) && $alerta==true){
            echo "<div class=\"alert alert-primary\" role=\"alert\">";
            echo "Paciente se guardo exitosamente";
            echo "</div>";
        }
    ?>
    
    <div >
        <form method="post" action="/paciente">
            <div class="row">
                <div class="col">
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label">Cedula:</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nombre">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="Apelldo" name="apellido">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Telefono:</label>
                        <input type="phone" class="form-control" id="telefono" name="telefono">
                    </div class="mb-4">
                    <button type="submit" class="btn btn-primary">Programar cita</button>

                </div>
                <!--<div class="col">
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label">Cedula:</label>
                        <input type="text" class="form-control" id="cedula" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="Apellido">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Telefono:</label>
                        <input type="phone" class="form-control" id="telefono">
                    </div class="mb-4">
                    <button type="submit" class="btn btn-primary">Programar cita</button>
                </div>-->
            </div>

        </form>
    </div>
</div>
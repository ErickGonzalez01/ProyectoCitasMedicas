<div>
    <?php
    if (isset($status) || isset($errores)) {
        if ($status === true) {
            foreach ($errores as $err) {
                echo "<div class=\"alert alert-primary\" role=\"alert\">" . $err . "</div>";
            }
        } else {
            foreach ($errores as $err) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">" . $err . "</div>";
            }
        }
    }

    ?>
    <br>
    <form method="POST" action="/traveler">
        <div>
            <div>
                <div class="row g-3">
                    <label class="col-md-6" for="servicio">Seleccione el tipo de cita</label>
                    <select class="col-md-6" name="id_servicio" id="servicio">
                        <?php
                            foreach ($servicios as $ser) {
                                echo "<option value=" . $ser["id"] . ">" . $ser["nombre_servicio"] . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id_paciente" name="id_paciente" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Numero de cedula</label>
                        <input type="text" class="form-control" id="cedula">
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputPassword1" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Fecha de la cita</label>
                        <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" aria-describedby="emailHelp">
                    </div>
                </div>                
            </div>
        </div>
        <br>
        <div>
            <button id="enviar" type="submit" class="btn btn-primary">Programar cita</button>
            <button id="enviar" type="reset" class="btn btn-primary">Cancelar</button>
        </div>
    </form>

    <script src="/build/js/jquery.js"></script>
    <script>
        //let consts=0;
        $("#cedula").keyup(function(e) {

            if ($("#cedula").val().length == 16) {

                let busqueda = new Object();
                busqueda.busqueda = $("#cedula").val();

                let json = JSON.stringify(busqueda);

                $.ajax({
                    url: "/api/paciente/busqueda",
                    type: "post",
                    data: json
                }).done(function(response) {
                    //console.log(consts)
                    //console.log(response);
                    //consts++;    

                    if (response != null) {
                        //Recuperar valor
                        $("#nombre").val(response.nombre + " " + response.apellido);
                        $("#id_paciente").val(response.id);

                        //Inhabilitar elementos
                        //console.log("Inhabilitar");
                        //$("#id_paciente").prop("disabled",true);
                        //$("#cedula").prop("disabled",true);
                        //$("#nombre").prop("disabled",true);

                        //Focus
                        $("#fecha_cita").focus();
                    }
                });
            }

        });
    </script>
</div>
<div class="card p-2">
    <div class="text-black">
        <u>
            <h3>Registro de citas medicas</h3>
        </u>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni nostrum, voluptatibus neque, officia accusantium, perspiciatis eum illo earum nihil magnam rerum illum deserunt autem eaque porro repellat molestias libero eius.</p>
        <u>
            <h5>citas medicas</h5>
        </u>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati id eius at doloribus tempora quo eveniet minima magni nostrum nam corrupti, ratione sed quam porro exercitationem reiciendis, excepturi architecto? Rerum?</p>
    </div>
    <?php if(isset($errores)): ?>
        <?php if($status===true):?>
            <div class="alert alert-primary">            
                <?php foreach ($errores as $err): ?>
                    <?=$err ?>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
        <?php if($status===false):?>
            <div class="alert alert-danger">            
                <?php foreach ($errores as $err): ?>
                    <p>• <?=$err ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
    <?php endif; ?>
    
    <form class="card p-3 bg-dark-subtle border border-info" method="POST" action="/traveler">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <label class="form-label"servicio">Servicio</label>
                    <select class="form-select" name="id_servicio" id="servicio">
                        <?php
                        foreach ($servicios as $ser) {
                            echo "<option value=" . $ser["id"] . ">" . $ser["nombre_servicio"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Numero de cedula</label>
                    <input type="text" class="form-control" id="cedula">
                </div>
                <div class="col">
                    <label for="exampleInputPassword1" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" readonly>
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Fecha de la cita</label>
                    <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" aria-describedby="emailHelp">
                </div>
            </div>
            
        </div>
        <div class="row p-3">
            <div class="col">
            <div>
                <button id="enviar" type="submit" class="btn btn-primary">Programar cita</button>
                <button id="enviar" type="reset" class="btn btn-primary">Cancelar</button>
                <input type="hidden" class="form-control" id="id_paciente" name="id_paciente" readonly>
            </div>
            </div>
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
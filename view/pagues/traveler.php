<div class="card p-3 p-t-5 m-1">
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
    <?php if (isset($errores)) : ?>
        <?php if ($status === true) : ?>
            <div class="alert alert-primary">
                <?php foreach ($errores as $err) : ?>
                    <?= $err ?>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
        <?php if ($status === false) : ?>
            <div class="alert alert-danger">
                <?php foreach ($errores as $err) : ?>
                    <p>• <?= $err ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
    <?php endif; ?>

    <form class="card p-2 bg-dark-subtle border border-info container" method="POST" action="/traveler">
        <div class="row">
            <div class="col-md">
                <label class="form-label">Servicio</label>
                <select class="form-select" name="id_servicio" id="servicio">
                    <option>--Seleccione--</option>
                    <?php foreach ($servicios as $ser) : ?>
                        <option value="<?= $ser["id"] ?>"><?= $ser["nombre_servicio"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md">
                <label for="exampleInputEmail1" class="form-label">Numero de cedula</label>
                <input type="text" class="form-control" id="cedula" value="<?= $paciente->cedula ?? "" ?>">
            </div>
            <div class="col-md">
                <label for="exampleInputPassword1" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" readonly value="<?php $nom = $paciente->nombre ?? ""; $app = $paciente->apellido ?? ""; $nom_app = $nom . " " . $app; echo $nom_app ?>">
            </div>
            <div class="col-md">
                <label for="exampleInputEmail1" class="form-label">Fecha de la cita</label>
                <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" aria-describedby="emailHelp">
                <input type="hidden" class="form-control" id="paciente_id" name="paciente_id" value="<?php echo $paciente->id ?? "" ?>"> <!------>
            </div>

        </div>
        <div class="row mt-1">
            <div class="col-md">
                <div>
                    <button type="submit" class="btn btn-primary">Programar cita</button>
                    <button type="reset" class="btn btn-primary">Cancelar</button>
                </div>
            </div>
        </div>
    </form>
    <!-- <script src="/build/js/jquery.js"></script> -->
    <script>
        //let consts=0;
        $("#cedula").keyup(function(e) {

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
                }).done(function(response) {
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
    </script>
</div>
<div class="card p-1 mt-1">
    <div class="text-black">
        <u>
            <h3>Lista de citas programadas de hoy</h3>
        </u>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis omnis reiciendis voluptas excepturi eaque
            incidunt amet, aut asperiores natus. Unde iure placeat sunt blanditiis assumenda ut beatae nesciunt aliquam
            perferendis.</p>
    </div>

    <form class="container mb-1" action="/listarcitas" method="POST" id="filtro">

        <div class="row">
            <div class="col-md">
                <label class="col-md form-label" for="date">Fecha</label>
            </div>

            <div class="col-md">
                <input class="col-md form-control" type="date" name="date" id="date">
            </div>

            <div class="col-md">
                <label class="form-label" for="servicio">Servicio</label>
            </div>

            <div class="col-md">
                <select class="form-control" name="servicio" id="servivio">
                    <option selected value="">--Seleccione--</option>
                    <?php if(isset($servicios)): ?>
                    <?php foreach($servicios as $servicio): ?>
                    <option value="<?=$servicio["id"]?>"><?=$servicio["nombre_servicio"]?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="col-md">
                <label class="form-label" for="buqueda">Buscar</label>
            </div>

            <div class="col-md">
                <input class="form-control" type="text" name="busqueda" id="busqueda">
            </div>

            <div class="col-md">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </div>

            <div class="col-md">
                <button type="reset" class="btn btn-warning"><i class="bi bi-x-circle-fill"></i></button>

            </div>
        </div>
    </form>

    <div class="container"> <!--table table-bordered border-primary -->
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th class="col">Id</th>
                    <th class="col">Nombre del paciente</th>
                    <th class="col">Servicio</th>
                    <th class="col">Fecha de solicitud</th>
                    <th class="col">Fecha de la cita</th>
                    <th class="col">Hora</th>
                    <th class="col">Estado</th>
                    <th class="col">Opciones</th>
                </tr>
            </thead>
            <tbody id="tb-body">
                <?php if (isset($citas)) : ?>

                <?php foreach ($citas as $cita) : ?>
                <tr>
                    <td><?php echo $cita["id"] ?></td>
                    <td><?php echo $cita["nombre"] . " " . $cita["apellido"] ?></td>
                    <td><?php echo $cita["nombre_servicio"] ?></td>
                    <td><?php echo $cita["fecha_registro"] ?></td>
                    <td><?php echo $cita["fecha_cita"] ?></td>
                    <td><?php echo $cita["hora_cita"] ?></td>
                    <td><?php echo $cita["status_cita"] ?></td>
                    <td>
                        <a href="/traveler/cita_creada?id=<?=$cita["id"]?>" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i>
                        </a>
                        <a class="btn btn-primary" href="#">
                            <i class="bi bi-repeat"></i>
                        </a>
                        <a class="btn btn-primary" href="#">
                            <i class="bi bi-x"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="datepiker">

    </div>
    <script>
    //Evento submit del formulario de busqueda
    $("#filtro").submit(function(ev) {

        //Solicitud post con ajax 
        $.ajax({
            type: $("#filtro").attr("method"), //Metodo de la solicitud
            url: $("#filtro").attr(
                "action"), //Direcion url a quien se le va a realizar la peticion, al servidor
            data: $("#filtro").serialize(), //Datos que se enviaran al servidor
            success: function(data) { //Funcion de ajax cuando se finaliza la solicitud y es exitosa
                LoadTableV2(
                    data
                    ); //Llamada al metodo para rellenar la tabla con los nuevos datos que el servidor le ha enviado
            }
        })
        ev.preventDefault(); //Previniendo que el formulario desencadene su evento por defecto
    });

    //Funcion para rellenar tabla de citas programadas
    function LoadTableV2(data) {

        //Limpiando las filas del table->body
        $("#tb-body").empty();

        //Recorriendo el objeto data como un array
        Object.values(data).forEach(val => { //recorriendo las filas

            //Creando elemento fila para la table
            let fila = $("<tr></tr>");

            //Creando enlaces para la columna opciones, en la tabla
            let a1 = $('<a class="btn btn-primary" href="#"><i class="bi bi-check-lg"></i></a>');
            let a2 = $('<a class="btn btn-primary" href="#"><i class="bi bi-repeat"></i></a>');
            let a3 = $('<a class="btn btn-primary" href="#"><i class="bi bi-x"></i></a>');

            //Creando la celda opciones y agregando los enlaces
            let celda_opciones = $("<td></td>");
            celda_opciones.append(a1);
            celda_opciones.append(a2);
            celda_opciones.append(a3);

            //Rellenando las celdas de las filas con los valores del data
            fila.append("<td>" + val.id + "</td>");
            fila.append("<td>" + val.nombre + " " + val.apellido + "</td>");
            fila.append("<td>" + val.nombre_servicio + "</td>");
            fila.append("<td>" + val.fecha_registro + "</td>");
            fila.append("<td>" + val.fecha_cita + "</td>");
            fila.append("<td>" + val.hora_cita + "</td>");
            fila.append("<td>" + val.status_cita + "</td>");
            fila.append(celda_opciones); //Agregando la celda de opciones a la fila

            //Peganfo las fila en la tabla
            $("#tb-body").append(fila);
        });
    }
    </script>
</div>
<div>
    <h2>Lista de citas programadas de hoy</h2>
    <form class="form" action="/listarcitas" method="POST" id="filtro">
        <div class="row g-3">
            <div class="col-auto d-flex gap-1">
                <label for="date">Fecha</label>
                <input class="form-control" type="date" name="date" id="date" value="<?php echo date("Y-m-d"); ?>">
            </div>
            <div class="col-auto d-flex gap-1">
                <label for="servicio">Servicio</label>
                <select class="form-control" name="servicio" id="servivio">
                    <option selected value="">--Seleccione--</option>
                    <option value="1">TB Test</option>
                    <option value="2">Traveler</option>
                </select>
            </div>
            <div class="col-auto d-flex gap-1">
                <label for="buqueda">Buscar</label>
                <input class="form-control" type="text" name="busqueda" id="busqueda">
            </div>
            <div class="col-auto d-flex gap-1">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                <button type="reset" class="btn btn-warning"><i class="bi bi-x-circle-fill"></i></button>
            </div>
        </div>
    </form>
    <div class="scroll">
        <table class="table table-dark">
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
                            <td> <?php echo $cita["id"] ?> </td>
                            <td> <?php echo $cita["nombre"] . " " . $cita["apellido"] ?> </td>
                            <td> <?php echo $cita["nombre_servicio"] ?> </td>
                            <td> <?php echo $cita["fecha_registro"] ?> </td>
                            <td> <?php echo $cita["fecha_cita"] ?> </td>
                            <td> <?php echo $cita["hora_cita"] ?> </td>
                            <td> <?php echo $cita["status_cita"] ?> </td>
                            <td class="d-flex gap-1">
                                <form action="">
                                    <input type="hidden" name="id" value="<?php echo $cita["id"] ?>">
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                </form>
                                <form action="">
                                    <input type="hidden" name="id" value="<?php echo $cita["id"] ?>">
                                    <button type="submit" class="btn btn-warning"><i class="bi bi-x-circle-fill"></i></button>
                                </form>
                                <form action="">
                                    <input type="hidden" name="id" value="<?php echo $cita["id"] ?>">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-person-x"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>


        </table>
    </div>
    <script>
        $("#filtro").submit(function(ev) {
            $.ajax({
                type: $("#filtro").attr("method"),
                url: $("#filtro").attr("action"),
                data: $("#filtro").serialize(),
                success: function(data) {
                    LoadTable(data);
                }
            })
            ev.preventDefault();
        });

        function LoadTable(datos) {
            let arrayPersona = datos;
            $("#tb-body").empty();
            for (let i = 0; i <= arrayPersona.length - 1; i++) {
                console.log(arrayPersona[i]);
                let strFila = "<tr><td>" + arrayPersona[i].id + "</td><td>" + arrayPersona[i].nombre + " " + arrayPersona[i].apellido + "</td><td>" + arrayPersona[i].nombre_servicio + "</td><td>" + arrayPersona[i].fecha_registro + "</td><td>" + arrayPersona[i].fecha_cita + "</td><td>" + arrayPersona[i].hora_cita + "</td><td>" + arrayPersona[i].status_cita + "</td><td  class=\"d-flex gap-1\"><form action=\"\"><input type=\"hidden\" name=\"id\" value=\"" + arrayPersona[i].id + "\"><button type=\"submit\" class=\"btn btn-danger\"><i class=\"bi bi-trash3\"></i></button></form><form action=\"\"><input type=\"hidden\" name=\"id\" value=\"" + arrayPersona[i].id + "\"><button type=\"submit\" class=\"btn btn-warning\"><i class=\"bi bi-x-circle-fill\"></i></button></form><form action=\"\"><input type=\"hidden\" name=\"id\" value=\"" + arrayPersona[i].id + "\"><button type=\"submit\" class=\"btn btn-primary\"><i class=\"bi bi-person-x\"></i></button></form></td></tr>";
                $("#tb-body").append(strFila);
            }

        }
    </script>
</div>
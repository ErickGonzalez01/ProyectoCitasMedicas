<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css?v=1">
    <script src="/build/js/jquery.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="position-relative">
            <div class="position-absolute top-0 start-50 translate-middle-x">
                <div class="card">
                    <form id="fotmGetPdf" method="POST" action="/report/pdf/cita">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                            <h4>Detalles de su citas</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, rem vitae atque accusamus
                                dicta exercitationem sit nobis nemo autem perspiciatis fuga, provident distinctio quae natus
                                consequuntur iure velit vel voluptate!
                            </p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                                    <li class="breadcrumb-item active"><a href="/traveler">Traveler</a></li>
                                </ol>
                            </nav>
                            <div class="border rounded-2 p-2">
                                <div class="col-md">
                                    <label class="form-label">Nombre</label>
                                    <input id="nombre" name="nombre" class="form-control" value="<?= $cita["nombre"] ?>">
                                </div>
                                <div class="col-md">
                                    <label class="form-label">Apellido</label>
                                    <input id="apellido" name="apellido" class="form-control" value="<?= $cita["apellido"] ?>">
                                </div>
                                <div class="col-md">
                                    <label class="form-label">Fecha de su citas</label>
                                    <input id="fecha_cita" name="fecha_cita" class="form-control" value="<?= $cita["fecha_cita"] ?>">
                                </div>
                                <div class="col-md">
                                    <label class="form-label">Hora de su citas</label>
                                    <input id="hora_cita" name="hora_cita" class="form-control" value="<?= $cita["hora_cita"] ?>">
                                </div>
                                <div class="col-md">
                                    <label class="form-label">Servicio</label>
                                    <input id="servicio" name="servicio" class="form-control" value="<?= $cita["nombre_servicio"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="btnGetPdf" type="submit" class="btn btn-primary">Descargar pdf</button>
                            <button class="btn btn-primary">Descargar img</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
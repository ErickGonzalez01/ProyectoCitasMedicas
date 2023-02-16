<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <!-- <link rel="stylesheet" href="<?=$dir?>"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="build/js/bootstrap.min.js"></script>
    <script src="build/js/jquery.js"></script>
    <title>Citas Medicas</title>
</head>

<body>
    <div id="app">
        <div class="main-container d-flex">
            <div class="sidebar" id="side_nav">
                <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                    <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">CM</span><span class="text-white">Citas Medicas</span></h1>
                    <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fal fa-stream"></i></button>
                </div>

                <ul class="list-unstyled px-2">
                    <li id="cita" class="<?php echo $sider["cita"] ?? "" ?>">
                        <a class="text-decoration-none px-3 py-2 d-block" href="/traveler">
                            <i class="bi bi-file-earmark-plus-fill"></i>
                            Registrar cita
                        </a>
                    </li>
                    <li id="paciente" class="<?php echo $sider["paciente"] ?? "" ?>">
                        <a class="text-decoration-none px-3 py-2 d-block" href="/paciente">
                            <i class="bi bi-person-plus"></i>
                            Registrar paciente
                        </a>
                    </li>
                    <li class="<?php echo $sider["citas_programadas"] ?? "" ?>">
                        <a class="text-decoration-none px-3 py-2 d-block" href="/listarcitas">
                            <i class="bi bi-card-checklist"></i>
                            Citas programadas
                        </a>
                    </li>
                    <li class="<?php echo $sider["lista_de_pacientes"] ?? "" ?>">
                        <a class="text-decoration-none px-3 py-2 d-block" href="/listarpacientes">
                            <i class="bi bi-list-ol"></i>
                            Lista de pacientes
                        </a>
                    </li>

                </ul>
                <hr class="h-css">
                <ul class="list-unstyled px-2 bg">
                    <li id="menu_lista" class=""><a class="text-decoration-none px-3 py-2 d-block" href="#"><i class="bi bi-gear-fill"></i> Configuraciones</a></li>
                    <li>
                        <ul id="menu" class="list-unstyled px-2 bg <?php if (isset($menu)) {echo $menu ? "online" : "inline";}else{echo "inline";}?>">
                            <li id="servicio"><a class="text-decoration-none px-3 py-2 d-block" href="#"><i class="fal fa-home"></i> Servicios</a></li>
                            <ul id="servicio-item" class="<?php if (isset($servicio)) {echo $servicio ? "online" : "inline";}else{echo "inline";}?>">
                                <li class="<?php echo $sider["listar_servicio"] ?? "" ?>"><a class="text-decoration-none px-3 py-2 d-block" href="/servicios"><i class="fal fa-home"></i> Lista de servicios</a></li>
                                <li class="<?php echo $sider["nuevo_servicio"] ?? "" ?>"><a class="text-decoration-none px-3 py-2 d-block" href="/servicionuevo"><i class="bi bi-plus"></i> Nuevo</a></li>
                                <li><a class="text-decoration-none px-3 py-2 d-block" href=""><i class="fal fa-home"></i> Servicios</a></li>
                            </ul>
                            <li id="usuario"><a class="text-decoration-none px-3 py-2 d-block" href="#"><i class="fal fa-home"></i> Usuarios</a></li>
                            <ul id="usuario-item" class="inline">
                                <li><a class="text-decoration-none px-3 py-2 d-block" href=""><i class="fal fa-home"></i> Servicios</a></li>
                                <li><a class="text-decoration-none px-3 py-2 d-block" href=""><i class="fal fa-home"></i> Servicios</a></li>
                                <li><a class="text-decoration-none px-3 py-2 d-block" href=""><i class="fal fa-home"></i> Servicios</a></li>
                            </ul>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div>
                    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
                        <div class="container-fluid">
                            <a class="navbar-brand text-white" href="/"><?php echo $usuario ?></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                </ul>
                                <div class="d-flex" role="search">
                                    <a href="/cerrar" class="btn btn-outline-success" type="buttom">Cerrar secion</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <div id="cargar" class="container">
                    <?php echo $contenido; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>-->
    <script src="build/js/jquery_main.js"></script>
</body>

</html>
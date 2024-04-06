<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css?v=17">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="/build/js/bootstrap.min.js"></script>
    <script src="/build/js/jquery.js"></script>
    <title>Citas Medicas</title>
</head>

<body>
    <!-- <h2>Hola desde runner acctions de github</h2> -->
    <div id="app">
        <div class="main-container d-flex">
            <div class="sidebar side_nav_cara side_nav" id="sider_menu_lateral">
                <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                    <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">CM</span><span class="text-white">Citas Medicas</span></h1>
                    <button id="sider_menu_lateral_ocultar" class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fal fa-stream"></i></button>
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
                            <ul id="servicio-item" class="<?php if (isset($servicioMenu)) {echo $servicioMenu ? "online" : "inline";}else{echo "inline";}?>">
                                <li class="<?php echo $sider["listar_servicio"] ?? "" ?>"><a class="text-decoration-none px-3 py-2 d-block" href="/servicios"><i class="fal fa-home"></i> Lista de servicios</a></li>
                                <li class="<?php echo $sider["nuevo_servicio"] ?? "" ?>"><a class="text-decoration-none px-3 py-2 d-block" href="/servicionuevo"><i class="bi bi-plus"></i> Nuevo</a></li>                            </ul>
                            <li id="usuario"><a class="text-decoration-none px-3 py-2 d-block" href="#"><i class="fal fa-home"></i> Usuarios</a></li>
                            <ul id="usuario-item" class="inline">
                                <li><a class="text-decoration-none px-3 py-2 d-block" href=""><i class="fal fa-home"></i> Usuarios</a></li>
                                <li><a class="text-decoration-none px-3 py-2 d-block" href=""><i class="fal fa-home"></i> Rool</a></li>
                                <li><a class="text-decoration-none px-3 py-2 d-block" href=""><i class="fal fa-home"></i> Nuevo</a></li>
                            </ul>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div>
                    <nav class="navbar bg-dark">
                        <div class="container-fluid">
                            <a id="sider_desplegar" type="button" class="btn btn-outline-success p-0 display-visible"><i class="bi bi-list"></i></a>
                            <a class="navbar-brand text-white" href="/"><?php echo $usuario ?></a>
                            <a id="sider_cerrar_sesion_l" href="/cerrar" class="btn btn-outline-success display-none" type="buttom">Cerrar secion</a>
                            <a id="sider_cerrar_sesion_m" href="/cerrar" class="btn btn-outline-success p-0 display-visible"><i class="bi bi-x-lg"></i></a>
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
    <script src="/build/js/jquery_main.js?v=2"></script>
</body>

</html>
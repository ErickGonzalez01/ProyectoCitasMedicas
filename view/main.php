<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/bootstrap/css/bootstrap.css">
    <title>Citas Medicas</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" id="secion" href="/">Clinica CitasMedicas</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/paciente">Nuevo paciente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                    <div>
                        <?php
                        if(isset($_SESSION["login"])){
                            echo "<a class=\"btn btn-outline-success\" type=\"button\">Cerrar secion</a>";
                        }else{
                            echo "<a href=\"/login\" class=\"btn btn-outline-success\" type=\"button\">Iniciar secion</a>";
                            echo "<a class=\"btn btn-outline-success\" type=\"button\">Registrate</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            </div>
        </nav>
    </header>
    <div>
        <?php echo $contenido ?>
    </div>
    <footer>
    </footer>
</body>

</html>
<div class="container card ms-auto me-auto mt-3 mb-3 p-3" style="width: 40rem;">
    <h1>PRIVILEGIOS DE USUARIO</h1>
    <P>Roles:</P>
    <ul>

        <?php foreach ($roles as $rol) : ?>
            <li>
                <h5><?= $rol["nombre"] ?><h5>
                <p><?= $rol["descripcion"]?></p>
            </li>
        <?php endforeach; ?>

    </ul>
</div>
<div class="card p-3 p-t-5 m-1">
    <div class="text-black">
        <u>
            <h3>Registro de paciente</h3>
        </u>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt facere eaque ex odio aliquid. Molestiae officia, optio reprehenderit repellendus soluta quibusdam praesentium in, reiciendis officiis a, quis aliquid numquam id?</p>
        <u>
            <h5>Lorem</h5>
        </u>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, qui accusamus? Sint libero id quod velit. Dolorem deserunt in sit nihil perspiciatis, quisquam nostrum, voluptas hic quos possimus nisi saepe?</p>
    </div>
    <?php if (isset($errores)) : ?>
        <?php if ($estado == false) : ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($errores as $error) : ?>
                    <p>• <?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if ($estado == true) : ?>
            <div class="alert alert-primary" role="alert">
                <?php foreach ($errores as $error) : ?>
                    <p>• <?= $error ?> <?php echo $paciente->nombre; ?> <a href="/programarcita?id=<?=$paciente->id?>">Programar cita</a></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <form id="FrmPaciente" class="container card p-2" method="post" action="/paciente">
        <div class="row">
            <div class="col-md">
                <label for="exampleInputEmail1" class="form-label">Cedula:</label>
                <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp" value="<?php echo $post["cedula"] ?? "" ?>">
            </div>
            <div class="col-md">
                <label for="exampleInputPassword1" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="nombre" value="<?php echo $post["nombre"] ?? "" ?>">
            </div>
            <div class="col-md">
                <label for="exampleInputPassword1" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="Apelldo" name="apellido" value="<?php echo $post["apellido"] ?? "" ?>">
            </div>
            <div class="col-md">
                <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $post["fecha_nacimiento"] ?? "" ?>">
            </div>
            <div class="col-md">
                <label for="exampleInputPassword1" class="form-label">Telefono:</label>
                <input type="phone" class="form-control" id="telefono" name="telefono" value="<?php echo $post["telefono"] ?? "" ?>">
            </div>
        </div>
        <div class="mt-2 row">
            <div class="col-md">
                <button id="paciente_submit" type="submit" class="btn btn-primary">Guardar paciente</button>
                <button id="paciente_submit" type="reset" class="btn btn-primary">Canselar</button>
            </div>
        </div>

    </form>
</div>
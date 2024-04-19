<div class="container card mt-3 ms-auto me-auto p-3" style="width: 40rem;">
    <h1>Usuarios</h1>
    <p>Lista de usuarios</p>
    <ul>
        <?php foreach ($usuarios as $usuario) : ?>
            <li>
                <h5><?= $usuario["nombre"]." ". $usuario["apellido"] ?></h5>
                <div style="display: none;">
                    <p>Correo: <?= $usuario["correo"] ?></p>
                    <p>Privilegios: <?= $usuario["rolles"]?></p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<script>
    console.log("Hola desde la vista de usuarios");
    $(document).ready(function(){
        $("li").click(function(){
            $(this).find("div").toggle();
        });
    });

</script>
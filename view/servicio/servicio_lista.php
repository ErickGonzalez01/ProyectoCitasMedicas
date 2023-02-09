<div class="card p-3 mt-1">
    <h4>Servios</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nobis, ipsa, optio aperiam nulla alias sint cupiditate excepturi commodi consequuntur illum! Sit ducimus quaerat accusantium deleniti blanditiis at quisquam autem?</p>
    <div class="card">
        <div class="card-header">
            <a href="/servicionuevo" class="btn btn-success"><i class="bi bi-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th WIDTH="50">Servicio</th>
                        <th WIDTH="50">Descripcion</th>
                        <th WIDTH="50">Detalle</th>
                        <th WIDTH="50">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($lista_servicio)) : ?>
                        <?php foreach ($lista_servicio as $servicio) : ?>
                            <tr>
                                <td><?= $servicio->nombre_servicio ?></td>
                                <td><?= $servicio->descripcion ?></td>
                                <td><?= $servicio->detalle ?></td>
                                <td>
                                    <a class="btn btn-primary" href="#"><i class="bi bi-pen"></i></a>
                                    <a class="btn btn-primary" href="#"><i class="bi bi-pen"></i></a>
                                    <a class="btn btn-primary" href="#"><i class="bi bi-pen"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
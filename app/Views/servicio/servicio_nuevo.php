<div class="card p-3 mt-1">
    <h4>Nuevo servicio</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolorum ipsa est quia earum qui, accusamus sed
        ratione? Tenetur deserunt doloribus ab fuga a nihil itaque dolore animi! Quo, explicabo.</p>
    <div class="card">
        <div class="card-header">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <h6>Nuevo servicio</h6>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero, id maxime necessitatibus laborum quas
                        laboriosam alias adipisci exercitationem culpa harum debitis non fugit, consectetur optio quasi! Et
                        quibusdam iure odio!
                    </p>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php foreach ($error as $key => $contenido): ?>
                                <p><?="• ".$contenido?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                    <?php if(isset($done)):?>
                        <div class="alert alert-success" role="alert">
                            <p>
                                <?="• ".$done?>
                            </p>
                        </div>
                    <?php endif?>

                </div>
                <div class="p-2 flex-shrink-1 bd-highlight">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-question-lg"></i></button>
                </div>
            </div>

        </div>
        <div class="card-body">
            <form action="/servicionuevo" method="POST">
                <div class="row align-items-end">
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Nombre del servicio</label>
                        <input name="nombre_servicio" class="form-control" type="text" value="<?= $datos["nombre_servicio"] ?? "" ?>">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Descripcion</label>
                        <input name="descripcion" class="form-control" type="text" value="<?= $datos["descripcion"] ?? "" ?>">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Detalle</label>
                        <input name="detalle" class="form-control" type="text" value="<?= $datos["detalle"] ?? "" ?>">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Hora de inicio</label>
                        <input name="hora_inicio_servicio" class="form-control" type="time" value="<?= $datos["hora_inicio_servicio"] ?? "" ?>">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Hora que finaliza el servicio</label>
                        <input name="hora_fin_servicio" class="form-control" type="time" value="<?= $datos["hora_fin_servicio"] ?? "" ?>">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Ciclo del servicio aplica de lunes a
                            viernes</label>
                        <input name="ciclo_citas_dia" class="form-control" type="number" value="<?= $datos["ciclo_citas_dia"] ?? "" ?>">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Ciclo del servicio en fin de semana si esta
                            disponible</label>
                        <input name="ciclos_citas_fin_de_semana" class="form-control" type="number" value="<?= $datos["ciclos_citas_fin_de_semana"] ?? "" ?>">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Duracion de las citas estimas en minutod
                            (m)</label>
                        <input name="duracion_cita" class="form-control" type="number" value="<?= $datos["duracion_cita"] ?? "" ?>">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Duracion de las citas por lote en minutos
                            (m)</label>
                        <input name="duracion_cita_lote" class="form-control" type="number" value="<?= $datos["duracion_cita_lote"] ?? "" ?>">
                    </div>
                    <div class="col-4">
                        <label for="">Servicio durante finde semana</label>
                        <select class="form-select" aria-label="Default select example" name="fin_de_semana" value="<?= $datos["fin_de_semana"] ?? "" ?>">
                            <option selected>Servio en finde semana</option>
                            <option value="true">Si</option>
                            <option value="false">No</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-1 d-grid gap-2 d-md-block">
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <!------>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ayuda sobre Servicio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <h6>Nombre del servicio</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati maxime natus sequi fuga, reprehenderit minus ipsum rerum similique at dolor animi quod amet labore unde? Sunt minus necessitatibus eos!
                        </p>
                    </div>
                    <div>
                        <h6>Nombre del servicio</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati maxime natus sequi fuga, reprehenderit minus ipsum rerum similique at dolor animi quod amet labore unde? Sunt minus necessitatibus eos!
                        </p>
                    </div>
                    <div>
                        <h6>Nombre del servicio</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati maxime natus sequi fuga, reprehenderit minus ipsum rerum similique at dolor animi quod amet labore unde? Sunt minus necessitatibus eos!
                        </p>
                    </div>
                    <div>
                        <h6>Nombre del servicio</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati maxime natus sequi fuga, reprehenderit minus ipsum rerum similique at dolor animi quod amet labore unde? Sunt minus necessitatibus eos!
                        </p>
                    </div>
                    <div>
                        <h6>Nombre del servicio</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati maxime natus sequi fuga, reprehenderit minus ipsum rerum similique at dolor animi quod amet labore unde? Sunt minus necessitatibus eos!
                        </p>
                    </div>
                    <div>
                        <h6>Nombre del servicio</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati maxime natus sequi fuga, reprehenderit minus ipsum rerum similique at dolor animi quod amet labore unde? Sunt minus necessitatibus eos!
                        </p>
                    </div>
                    <div>
                        <h6>Nombre del servicio</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati maxime natus sequi fuga, reprehenderit minus ipsum rerum similique at dolor animi quod amet labore unde? Sunt minus necessitatibus eos!
                        </p>
                    </div>
                    <div>
                        <h6>Nombre del servicio</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati maxime natus sequi fuga, reprehenderit minus ipsum rerum similique at dolor animi quod amet labore unde? Sunt minus necessitatibus eos!
                        </p>
                    </div>
                    <div>
                        <h6>Nombre del servicio</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati maxime natus sequi fuga, reprehenderit minus ipsum rerum similique at dolor animi quod amet labore unde? Sunt minus necessitatibus eos!
                        </p>
                    </div>
                    <div>
                        <h6>Nombre del servicio</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati maxime natus sequi fuga, reprehenderit minus ipsum rerum similique at dolor animi quod amet labore unde? Sunt minus necessitatibus eos!
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
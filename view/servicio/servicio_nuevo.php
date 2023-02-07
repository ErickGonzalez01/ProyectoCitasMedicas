<div class="card p-3 mt-1">
    <h4>Nuevo servicio</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolorum ipsa est quia earum qui, accusamus sed
        ratione? Tenetur deserunt doloribus ab fuga a nihil itaque dolore animi! Quo, explicabo.</p>
    <div class="card">
        <div class="card-header">
            <h6>Nuevo servicio</h6>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero, id maxime necessitatibus laborum quas
                laboriosam alias adipisci exercitationem culpa harum debitis non fugit, consectetur optio quasi! Et
                quibusdam iure odio!</p>
        </div>
        <div class="card-body">
            <form action="/servicionuevo" method="POST">
                <div class="row align-items-end">
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Nombre del servicio</label>
                        <input name="nombre_servicio" class="form-control" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Descripcion</label>
                        <input name="descripcion" class="form-control" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Detalle</label>
                        <input name="detalle" class="form-control" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Hora de inicio</label>
                        <input name="hora_inicio_servicio" class="form-control" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Hora que finaliza el servicio</label>
                        <input name="hora_fin_servicio" class="form-control" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Ciclo del servicio aplica de lunes a viernes</label>
                        <input name="ciclo_citas_dia" class="form-control" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Ciclo del servicio en fin de semana si esta disponible</label>
                        <input name="ciclos_citas_fin_de_semana" class="form-control" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Duracion de las citas estimas en minutod (m)</label>
                        <input name="duracion_cita" class="form-control" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Duracion de las citas por lote en minutos (m)</label>
                        <input name="duracion_cita_lote" class="form-control" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="nombre_servicio">Fin de semana</label>
                        <input name="fin_de_semana" class="form-control" type="text">
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary">Enviar</button>
                </div>

            </form>
        </div>
    </div>
</div>
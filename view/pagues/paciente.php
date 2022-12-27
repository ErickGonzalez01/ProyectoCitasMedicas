<div>
    <form class="row g-3" method="post" action="/paciente">
        <div class="col-md-4">
            <label for="exampleInputEmail1" class="form-label">Cedula:</label>
            <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp">
        </div>
        <div class="col-md-4">
            <label for="exampleInputPassword1" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="nombre">
        </div>
        <div class="col-md-4">
            <label for="exampleInputPassword1" class="form-label">Apellido:</label>
            <input type="text" class="form-control" id="Apelldo" name="apellido">
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento:</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1" class="form-label">Telefono:</label>
            <input type="phone" class="form-control" id="telefono" name="telefono">
        </div class="mb-4">
        <div class="d-inline-flex p-2 bd-highlight">
            <button type="submit" class="btn btn-primary">Guardar paciente</button>
        </div>
        

    </form>
</div>
<div class="container">
    <form name="paciente" id="paciente">
        <div class="row">
            <div class="col">
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">Numero de cedula</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">Fecha de la cita</label>
                    <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Hora de la cita</label>
                    <input type="time" class="form-control" id="exampleInputPassword1" name="nombre">
                </div>                
            </div>
        </div>
        <button id="enviar" type="submit" class="btn btn-primary">Programar cita</button>
        <button id="enviar" type="reset" class="btn btn-primary">Cancelar</button>
    </form>

    <script src="/build/js/jquery.js"></script>
    <script>
        let consts=0;
        $("#cedula").keyup(function(e) {
            
            if($("#cedula").val().length==16){

                let busqueda = new Object();
                busqueda.busqueda=$("#cedula").val();
            
                let json = JSON.stringify(busqueda);

                $.ajax({
                    url:"/api/paciente/busqueda",
                    type:"post",
                    data: json
                }).done(function(response){
                    console.log(consts)
                    console.log(response);
                    consts++;    

                    if(response!=null){
                        //Recuperar valor
                        $("#nombre").val(response.nombre + " " + response.apellido);
                        $("#id").val(response.id);

                        //Inhabilitar elementos
                        console.log("Inhabilitar");
                        $("#id").prop("disabled",true);
                        $("#cedula").prop("disabled",true);
                        $("#nombre").prop("disabled",true);

                        //Focus
                        $("#fecha_cita").focus();
                    }
                });
            }
           
        });
    </script>
</div>
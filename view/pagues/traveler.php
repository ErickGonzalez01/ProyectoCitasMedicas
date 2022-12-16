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
                    <input type="text" class="form-control" id="exampleInputPassword1" name="nombre">
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">Fecha de la cita</label>
                    <input type="date" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Hora de la cita</label>
                    <input type="time" class="form-control" id="exampleInputPassword1" name="nombre">
                </div>
                <button id="enviar" type="submit" class="btn btn-primary">Programar cita</button>
            </div>
        </div>
    </form>

    <script src="/build/js/jquery.js"></script>
    <script>
        $("#cedula").keyup(function(e) {
            let i = 0;
            let form = document.getElementById("paciente").addEventListener("submit", function(formulario) {
                formulario.preventDefault();

                console.log("previniendo default => " + i);
                i++;
            }); 
            form;
            if (e.which == 13) {
                console.log("Has dado enter");
            }
            if (e.which == 9) {
                console.log("Has dado Tab");
            }
            console.log($("#cedula").val());
        });
        $("#enviar").click(function(evento){
            let i=0;
            let form = document.getElementById("paciente").addEventListener("submit", function(formulario) {
                console.log("default => " + i);
               i++;
            });
        });
    </script>
</div>
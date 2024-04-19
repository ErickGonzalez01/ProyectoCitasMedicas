<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-md-6 col-sm-12 card p-3 mb-2 table-responsive">
            <h6>Usuarios:</h6>
            <?= $tabla_usuarios ?? "" ?>
        </div>
        <div class="col-md-6 col-sm-12 card p-3 mb-3 d-flex flex-direction-column gap-1">
            <div class="card p-1" style="height: 50%;">
                <h4>Rooles:</h4>
                <h5 id="usuario_neme"></h5>
                <div class="overflow-auto">
                    <ul id="rool_de_usuario"></ul>
                </div>

            </div>
            <div class="card p-1" style="height: 50%;">
                <h4>Agregar roles:</h4>
                <div class="overflow-auto">
                    <ul id="roles_de_la_aplicacion"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let userRoles = {
        correo: "",
        nombre: "",
        apellido: "",
        rolesDelUsuario: [],
        roles: [],
        html: {
            tablaUsuarios: $("#table_usuario tbody tr"),
            infoUsuario: $("#usuario_neme"),
            roles: $("#roles_de_la_aplicacion"),
            rolesUsuario: $("#rool_de_usuario"),
            //addRolesLi: $("#roles_de_la_aplicacion li"),
        },
        init: function() {

            this.html.tablaUsuarios.on("click", this.onRowClick);
            userRoles.getRoles();

        },
        removeRoles: async function() {

            const rolSeleccionado = $(this).find("h6").text();
            let rolId = userRoles.roles.find((element) => {

                return element.nombre == rolSeleccionado;

            });

            let frmData = new FormData();

            frmData.append("correo", userRoles.correo);
            frmData.append("roll", rolId.id);

            let confm = window.confirm("¿Desea eliminar el rol?");
            if (!confm) {
                return;
            }
            let res = await $.ajax({
                url: "<?= base_url("/user/removeroll") ?>",
                method: "POST",
                data: frmData,
                processData: false,
                contentType: false
            });

            alert(res.mensaje);
            $("#rool_de_usuario").empty();
            await userRoles.getRolesDelUsuario(userRoles.correo);
            await userRoles.mostrarRolesDelUsuario();
            await userRoles.actualizarRolesDisponibles();

        },
        addRoles: async function() {
            if(userRoles.correo == ""){
                alert("Seleccione un usuario");
                return;
            }

            let confirm = window.confirm("¿Desea agregar el rol?");

            if (!confirm) {
                return;
            }

            let rolSeleccionado = $(this).find("h6").text();
            let rolId = userRoles.roles.find((element) => {
                return element.nombre == rolSeleccionado;
            });

            let frmData = new FormData();
            frmData.append("correo", userRoles.correo);
            frmData.append("roll", rolId.id);

            let response = await $.ajax({
                url: "<?= base_url("/user/addroll") ?>",
                method: "POST",
                data: frmData,
                processData: false,
                contentType: false
            });

            alert(response.mensaje);

            $("#rool_de_usuario").empty();
            await userRoles.getRolesDelUsuario(userRoles.correo);
            await userRoles.mostrarRolesDelUsuario();
            await userRoles.actualizarRolesDisponibles();

        },
        actualizarRolesDisponibles: function() { //Actualizar los roles disponibles

            userRoles.html.roles.empty();

            let roles_disponible = userRoles.roles.filter((element) => {

                let existe = userRoles.rolesDelUsuario.find((rol) => {

                    return rol.roll == element.nombre;

                });

                return existe == undefined;

            });

            roles_disponible.forEach(element => {

                let li = $("<li></li>").addClass("d-flex flex-direction-row justify-content-between mb-2");

                let h6 = $("<h6></h6>");
                h6.text(element.nombre);

                let a = $("<a></a>");
                a.addClass("btn btn-primary");
                a.text("Agregar");

                li.append(h6);
                li.append(a);

                userRoles.html.roles.append(li);

            });

            let li = $("#roles_de_la_aplicacion li");
            li.on("click", this.addRoles);
        },
        onRowClick: async function() {

            let td = $(this).find("td");
            userRoles.correo = td[2].innerText;
            userRoles.nombre = td[0].innerText;
            userRoles.apellido = td[1].innerText;

            await userRoles.getRolesDelUsuario(userRoles.correo);
            await userRoles.mostrarRolesDelUsuario();
            await userRoles.mostrarInformacionDelUsuario();
            await userRoles.actualizarRolesDisponibles();

        },
        getRoles: async function() {
            let roles = await $.ajax("<?= base_url("/user/roles") ?>");
            if (roles) {
                userRoles.roles = roles;
                userRoles.mostrarRoles();
                userRoles.html.addRolesLi = $("#roles_de_la_aplicacion li");
                this.html.addRolesLi.on("click", this.addRoles);
            }
        },
        mostrarRoles: function() {

            userRoles.roles.forEach(element => {

                let li = $("<li></li>");
                li.addClass("d-flex flex-direction-row justify-content-between mb-2");

                let h6 = $("<h6></h6>");
                h6.text(element.nombre);

                let a = $("<a></a>");
                a.addClass("btn btn-primary");
                a.text("Agregar");

                li.append(h6);
                li.append(a);
                userRoles.html.roles.append(li);
            });
        },
        mostrarRolesDelUsuario: function() {

            userRoles.rolesDelUsuario.forEach(element => {

                let li = $("<li></li>")
                li.addClass("d-flex flex-direction-row justify-content-between mb-2");

                let h6 = $("<h6></h6>");
                h6.text(element.roll);

                let a = $("<a></a>");
                a.addClass("btn btn-danger");
                a.text("Eliminar");

                li.append(h6);
                li.append(a);

                userRoles.html.rolesUsuario.append(li);
            });

            let li = $("#rool_de_usuario li");
            li.on("click", this.removeRoles);
        },
        mostrarInformacionDelUsuario: function() {
            userRoles.html.infoUsuario.text(userRoles.nombre + " " + userRoles.apellido + " - " + userRoles.correo);
        },
        getRolesDelUsuario: async function($correo) {
            userRoles.html.rolesUsuario.empty();
            let rol = await $.ajax("<?= base_url("/user/rollofuser") ?>" + "?correo=" + this.correo);
            userRoles.rolesDelUsuario = rol;
        }
    }

    $(document).ready(userRoles.init());
</script>
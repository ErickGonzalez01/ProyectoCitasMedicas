<div class="card p-3 mt-1">
    <h4>Lista de pacientes registrados</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem a vel, velit blanditiis facere tempore laboriosam aliquid nobis at! Veniam quasi quis sequi esse, ratione eveniet minima distinctio nobis quibusdam.</p>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre y apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>telefono</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($lista_de_pacientes)) : ?>                    
                    <?php foreach ($lista_de_pacientes as $paciente) : ?>
                        <tr>
                            <td><?php echo $paciente->cedula ?></td>
                            <td><?php echo $paciente->nombre." ".$paciente->apellido ?></td>
                            <td><?php echo $paciente->fecha_nacimiento ?></td>
                            <td><?php echo $paciente->telefono ?></td>
                            <td>
                                <a  class="btn btn-primary" type="buttom" href="/programarcita?id=<?=$paciente->id ?>"><i class="bi bi-file-earmark-plus"></i></a>
                            </td>
                        </tr>                
                    <?php endforeach ?>                    
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<div>
    <h4>Lista de pacientes registrados</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem a vel, velit blanditiis facere tempore laboriosam aliquid nobis at! Veniam quasi quis sequi esse, ratione eveniet minima distinctio nobis quibusdam.</p>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Cedula</td>
                    <td>Nombre y apellido</td>
                    <td>Fecha de nacimiento</td>
                    <td>telefono</td>
                    <td>Opciones</td>
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
                                <a type="buttom" href="#"></a>
                                <a type="buttom" href="#"></a>
                                <a type="buttom" href="#"></a>
                            </td>
                        </tr>                
                    <?php endforeach ?>                    
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
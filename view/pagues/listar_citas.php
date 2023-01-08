<div>
    <h2>Lista de citas programadas de hoy</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Id del paciente</th>
            <th>Id del servicio</th>
            <th>Fecha del registro</th>
            <th>Fecha de la cita</th>
            <th>Hora de la cita</th>
            <th>Estado de las citas</th>
            <th>Duracion de las citas</th>
            <th>Citas por lote</th>
            <th>Ciclo del servicio</th>
        </tr>
        <?php 
        if(isset($lista_de_citas)){
            foreach($lista_de_citas as $cita){
                echo "<tr>
                    <td>$cita[\"id\"]</td>
                    <td>$cita[\"id_paciente\"]</td>
                    <td>$cita[\"id_servicio\"]</td>
                    <td>$cita[\"fecha_registro\"]</td>
                    <td>$cita[\"fecha_cita\"]</td>
                    <td>$cita[\"hora_cita\"]</td>
                    <td>$cita[\"status_cita\"]</td>
                    <td>$cita[\"duracio_cita\"]</td>
                    <td>$cita[\"citas_lote\"]</td>
                    <td>$cita[\"ciclo_servicio\"]</td>
                </tr>
                ";
            }
        }
       
        
        
        
        ?>
    </table>
</div>
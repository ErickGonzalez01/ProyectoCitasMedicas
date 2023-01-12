<div>
    <h2>Lista de citas programadas de hoy</h2>
    <div class="scroll">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class="col">Id</th>
                    <th class="col">Nombre del paciente</th>
                    <th class="col">Servicio</th>
                    <th class="col">Fecha de solicitud</th>
                    <th class="col">Fecha de la cita</th>
                    <th class="col">Hora</th>
                    <th class="col">Estado</th>
                    <th class="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($citas)){
                     //debuguear($citas);
                        foreach($citas as $cita){
                            echo "<tr>";
                            echo "<td>".$cita["id"]."</td>";
                            echo "<td>".$cita["nombre"]." ".$cita["apellido"]."</td>";
                            echo "<td>".$cita["nombre_servicio"]."</td>";
                            echo "<td>".$cita["fecha_registro"]."</td>";
                            echo "<td>".$cita["fecha_cita"]."</td>";
                            echo "<td>".$cita["hora_cita"]."</td>";
                            echo "<td>".$cita["status_cita"]."</td>";
                            echo "<td>
                                <form>
                                    <a class=\"btn btn-secundary\" type=\"submit\" href=\"#\"></a>
                                    <a class=\"btn btn-primary\" type=\"submit\" href=\"#\"></a>
                                </form>
                                </td>";
                            echo "</tr>";
                        }
                    }       
                ?>
            </tbody>
            
            
        </table>
    </div>
    
</div>
<diw class="row">
    <div class="col">
        <div>
            <div class="contenido">
                <div class="calendario">
                    <header>
                        <h2 id="mes">Abril</h2>
                        <a class="btn-ant" id="btn-prev"><</a>
                        <a class="btn-pro" id="btn-ant">></a>
                    </header>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Dom.</th>
                                <th>Lun.</th>
                                <th>Mar.</th>
                                <th>Mie.</th>
                                <th>Jue.</th>
                                <th>Vie.</th>
                                <th>Sáb.</th>
                            </tr>
                        </thead>
                        <tbody id="dias">
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>
                        </tbody>
                    </table>
                    <footer>
                        <h2 id="ano">2020</h2>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div>
            <form id="form_paciente" method="POST" action="/api/paciente/crear"">
                <div>
                    <label for="cedula">Cédula:</label>
                    <input class="form-control" type="text" name="cedula" id="cedula">                 
                </div>                    
                <div>
                    <label for="nombre">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre">
                </div>
                <div>
                    <label for="apellido">Apellido:</label>
                    <input class="form-control" type="text" name="apelldo" id="apellido">
                </div>
                <div>
                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento">
                </div>
                <div>
                    <label for="telefono">Telefono:</label>
                    <input class="form-control" type="text" name="telefono" id="telefono">
                </div>
                <div>
                    <label for="fecha">Fecha de la cita:</label>
                    <input readonly class="form-control" type="date" name="fecha" id="fecha">
                </div>
                <div>
                    <label for="now_cite">Elegir hora de cita:</label>
                    <select name="new_cite" class="form-control" id="new_cite">
                        <section></section>
                        <option value="08:00am">08:00am</option>
                        <option value="09:00am">09:00am</option>
                        <option value="10:00am">10:00am</option>
                        <option value="11:00am">11:00am</option>
                        <option value="12:00pm">12:00pm</option>
                        <option value="01:00pm">01:00pm</option>
                        <option value="02:00pm">02:00pm</option>
                        <option value="03:00pm">03:00pm</option>
                        <option value="04:00pm">04:00pm</option>
                        <option value="05:00pm">05:00pm</option>
                    </select>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                    <button class="btn btn-secondary" type="delete">Limpiar</button>
                </div>
            </form>
        </div>
    </div>
</diw>
<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="container-area">
    <div class="details">
        <form method="get">
            <div class="form-general">
                <div class="form-responsive">
                    <div class="item-responsive">
                        <input type="month" name="fs">
                    </div>
                    <div class="item-responsive">
                        <select name="">
                            <option>Modalidade</option>
                        </select>
                    </div>
                    <div class="item-responsive">
                        <select name="">
                            <option>Bruno Celedonio</option>
                        </select>
                    </div>
                    <div class="button">
                        <button>BUSCAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="margin-left-5">
        <h2>Novo Agendamento</h2>
    </div>
    <div class="margin-left-5">
        <div>
            <br>
            <div class="scheduling">
                <div>Profissional: Bruno Celedonio</div>
                <div class="table-style">
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Vagas Dispóniveis</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form method="get">
                                <td>10/12/2021</td>
                                    <td>
                                    <select name="hora" id="">
                                        <option></option>
                                        <option>2:30</option>
                                        <option>2:00</option>
                                    </select>
                                </td>
                                <td>5</td>
                                <td><button class="cancelar">Agendar</button></td>
                                </form>
                            </tr>
                            <tr>
                                <form method="get">
                                <td>10/12/2021</td>
                                    <td>
                                    <select name="hora" id="">
                                        <option></option>
                                        <option>2:30</option>
                                        <option>2:00</option>
                                    </select>
                                </td>
                                <td>5</td>
                                <td><button class="cancelar">Agendar</button></td>
                                </form>
                            </tr>
                            <tr>
                                <form method="get">
                                <td>10/12/2021</td>
                                    <td>
                                    <select name="hora" id="">
                                        <option></option>
                                        <option>2:30</option>
                                        <option>2:00</option>
                                    </select>
                                </td>
                                <td>5</td>
                                <td><button class="cancelar">Agendar</button></td>
                                </form>
                            </tr>
                            <tr>
                                <form method="get">
                                <td>10/12/2021</td>
                                    <td>
                                    <select name="hora" id="">
                                        <option></option>
                                        <option>2:30</option>
                                        <option>2:00</option>
                                    </select>
                                </td>
                                <td>5</td>
                                <td><button class="cancelar">Agendar</button></td>
                                </form>
                            </tr>
                            <tr>
                                <form method="get">
                                <td>10/12/2021</td>
                                    <td>
                                    <select name="hora" id="">
                                        <option></option>
                                        <option>2:30</option>
                                        <option>2:00</option>
                                    </select>
                                </td>
                                <td>5</td>
                                <td><button class="cancelar">Agendar</button></td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <hr> <br><br>
    <h3 class="margin">Últimos Agendamentos</h3>
    <div class="table-style">
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Paciente</th>
                    <th>Modalidade</th>
                    <th>Presença</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>26/03/2021</td>
                    <td>Carlos Eduardo</td>
                    <td>Pilates</td>
                    <td>Sim</td>
                    <td>...</td>
                </tr>
                <tr>
                    <td>26/03/2021</td>
                    <td>Carlos Eduardo</td>
                    <td>Pilates</td>
                    <td>Não</td>
                    <td>Doente</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
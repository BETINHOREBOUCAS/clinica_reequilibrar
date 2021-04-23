<?php

use src\handlers\PrintHandler;

//PrintHandler::print_r($viewData);
?>
<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="container-area">
    <div class="details">
        <form method="get">
            <div class="form-general">
                <div class="form-responsive">
                    <div class="item-responsive">
                        <input type="month" name="month">
                    </div>
                    <div class="item-responsive">
                        <select name="modality">
                            <option value="">Modalidade</option>
                            <?php if(isset($modality) && !empty($modality)) :?>
                                <?php foreach ($modality as $value) :?>
                                    <option value="<?=$value['id'];?>"><?=ucfirst($value['nome']);?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="item-responsive">
                        <select name="professional">
                            <option value="">Profissional</option>
                            <?php if(isset($professional) && !empty($professional)) :?>
                                <?php foreach ($professional as $value) :?>
                                    <option value="<?=$value['id'];?>"><?=ucfirst($value['nome']);?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="button">
                        <button>BUSCAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php if(isset($schedule) && !empty($schedule)) :?>
    <?php if(!isset($schedule['aviso']) && empty($schedule['aviso'])):?>
    <div class="margin-left-5">
        <h2 class="title-scheduling">Novo Agendamento</h2>
    </div>
    <div class="margin-left-5">
        <div>
            <br>
            <div class="scheduling">
                <div class="professional">Profissional: Bruno Celedonio</div>
                <div class="table-style">
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Modalidade</th>
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
                                <td>Cardio</td>
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
    <?php else :?>
        <?=$schedule['aviso'];?>
    <?php endif ?>
    <?php endif ?>

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
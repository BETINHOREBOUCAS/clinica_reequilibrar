<?php

use src\handlers\PrintHandler;

//PrintHandler::print_r($schedule, true);
?>
<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="container-area">
    <div class="details">
        <form method="get">
            <div class="form-general margin-left-10">
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
        <h2 class="title-scheduling" id="teste">Novo Agendamento</h2>
    </div>
    <div class="margin-left-5">
        <div>
            <div class="scheduling">
                <?php foreach ($schedule as $key_professional => $schedule_value) :?>

                <div class="professional">Profissional: <?=$key_professional;?></div>
                <div class="table-style form-general">
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
                                    <td>
                                        <select name="date" class="available-date">
                                            <option value="null"></option>
                                            <?php foreach ($schedule_value as $key => $value) :?>
                                            <option
                                                value='{
                                                    "data":"<?=$value['data'];?>",
                                                    "idProfissional":"<?=$value['id_profissional'];?>",
                                                    "url":"<?=$base;?>"
                                                    }'>
                                                <?=$value['data'];?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="hora" id="available-time">

                                            <option>Horario Disponivel</option>

                                        </select>
                                    </td>

                                    <td>5</td>
                                    <td><button class="cancelar">Agendar</button></td>
                                </form>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <br>
                <hr>
                <?php endforeach ?>
            </div>

        </div>
    </div>
    <?php else :?>
    <?=$schedule['aviso'];?>
    <?php endif ?>
    <?php endif ?>


    <h2 class="title-scheduling">Últimos Agendamentos</h2>
    <div class="table-style form-general">
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

<script src="<?=$base;?>/assets/js/ajax.js"></script>
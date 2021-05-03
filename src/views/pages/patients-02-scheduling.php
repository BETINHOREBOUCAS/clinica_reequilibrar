<?php
$cont = 0;
use src\handlers\PrintHandler;

//PrintHandler::print_r($last, true);
?>
<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="container-area">
    <div class="details">
        <form method="get">
            <div class="form-general margin-left-10">
                <div class="form-responsive">
                    <div class="item-responsive">
                        <input type="month" name="month" value="<?= $_GET['month']?? $today;?>">
                    </div>
                    <div class="item-responsive">
                        <select name="modality">
                            <option value="">Todas modalidade</option>
                            <?php if(isset($modality) && !empty($modality)) :?>
                            <?php foreach ($modality as $value) :?>
                            <option value="<?=$value['id'];?>" <?=$value['id'] == ($_GET['modality']??"")?"selected":"";?>><?=ucfirst($value['nome']);?></option>
                            <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="item-responsive">
                        <select name="professional">
                            <option value="">Todos profissionais</option>
                            <?php if(isset($professional) && !empty($professional)) :?>
                            <?php foreach ($professional as $value) :?>
                            <option value="<?=$value['id'];?>" <?=$value['id'] == ($_GET['professional']??"")?"selected":"";?>><?=ucfirst($value['nome']);?></option>
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

    <?php if(!empty($notice)) :?>
    <?= $render('warning', $notice);?>
    <?php endif ?>

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
                                <th>Vagas Dispóniveis</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form method="post" class="form-agenda">
                                    <td>
                                        <select name="date" class="available-date" required>
                                        <?php $count = 1 ?>
                                            <?php foreach ($schedule_value as $key => $value) :?>
                                            <?php if($count == 1) : ?>
                                            <?php $count++ ?>
                                            <option
                                                value='{
                                                    "data":"2000-01-01",
                                                    "idProfissional":"<?=$value['id_profissional'];?>",
                                                    "url":"<?=$base;?>"
                                                    }'>
                                                Selecionar data
                                            </option>
                                            <?php endif ?>
                                            <?=$value['id_profissional'];?>
                                            <?php if($value['disponivel'] == 1) :?>
                                            <option
                                                value='{
                                                    "data":"<?=$value['data'];?>",
                                                    "idProfissional":"<?=$value['id_profissional'];?>",
                                                    "url":"<?=$base;?>"
                                                    }'>
                                                <?=date_format(date_create($value['data']), 'd/m/Y')?>
                                            </option>
                                            <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="hora" id="available-time-<?=$schedule_value[0]['id_profissional'];?>" required>
                                            <option></option>
                                        </select>
                                    </td>
                                    <td><button class="btn-agenda">Agendar</button></td>
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


    <?php if(isset($last) && !empty($last)):?>
    <h2 class="title-scheduling">Últimos Agendamentos</h2>
    <div class="table-style form-general">
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Profissional</th>
                    <th>Presença</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
            
            <?php foreach ($last as $value) :?>
                <tr>
                    <td><?=date_format(date_create($value['data']), 'd/m/Y')?></td>
                    <td><?=$value['nome']?></td>
                    <td><?=$value['comparecimento']?></td>
                    <td><?=$value['motivo']?></td>
                </tr>
            <?php endforeach ?>
            
            </tbody>
        </table>
    </div>
    <?php endif ?>

</div>

<script src="<?=$base;?>/assets/js/ajax.js?<?= filemtime('assets/js/ajax.js');?>"></script>
<?php $render('header', ['user' => $user]); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <?= $render('information-patient', $patient); ?>

    <?= $render('service-patient', $idAgendamento); ?>

    <div class="register">
        <div class="form-register">
            <form method="post">
                <div class="on-input">
                    <div class="margin-botton-10">Data da consulta</div>
                    <div class="input-date">
                        <input type="date" name="data-consulta" value="<?= $dataAtual??"" ?>">
                    </div>
                </div>
                <div class="padding-responsive on-input">
                    <div class="margin-botton-10">Modalidade</div>                    
                        <select name="" id="">
                            <option value=""></option>
                            <?php foreach ($modality as $value) :?>
                                <option value=""><?=ucfirst($value['nome']);?></option>
                            <?php endforeach ?>
                        </select>                    
                </div>
                <!--
                <div class="input-flex">                    
                    <div class="margin-right-10">
                        <label>
                            Valor Consulta <br>
                            <input type="text" name="title-consulta">
                        </label>
                    </div>
                    <div class="margin-right-10">
                        <label>
                            Desconto <br>
                            <input type="text" name="title-consulta">
                        </label>
                    </div>
                    <div class="padding-responsive margin-right-10">
                        <label>
                            Convênio <br>
                            <select name="" id="">
                                <option value=""></option>
                                <option value="">Sindicato</option>
                            </select>
                        </label>
                    </div>
                    <div>
                        <label>
                            Valor Total <br>
                            <input type="text" name="title-consulta">
                        </label>
                    </div>
                </div>
                -->
                <div class="on-input">
                    <div class="margin-botton-10">Título</div>
                    <div>
                        <input type="text" name="title-consulta">
                    </div>
                </div>
                <div class="on-input">
                    <div class="margin-botton-10">Descreva detalhes da avaliação</div>
                    <div>
                        <textarea name="consulta" id="consulta"></textarea>
                    </div>
                </div>
        </div>
        <div class="button-save form-general">
            <button>Salvar</button>
        </div>
        </form>
    </div>



</div>
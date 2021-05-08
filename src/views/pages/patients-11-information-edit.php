<?php $render('header', ['user' => $user]); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <?= $render('information-patient'); ?>

    <div class="register">
        <div class="form-register">
            <form method="post">
                <div class="on-input">
                    <div class="margin-botton-10">Data da consulta</div>
                    <div class="input-date">
                        <input type="date" name="data-consulta">
                    </div>
                </div>
                <div class="padding-responsive on-input">
                    <div class="margin-botton-10">Modalidade</div>
                    
                        <select name="" id="">
                            <option value=""></option>
                            <option value="">Ventosa</option>
                        </select>
                    
                </div>
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
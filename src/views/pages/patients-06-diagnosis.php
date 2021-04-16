<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <?= $render('information-patient'); ?>

    <?= $render('service-patient'); ?>

    <div class="register-patient">
        <div class="form-register">
            <form method="post">
                <div class="on-input">
                    <div class="margin-botton-10">Data do Diagnóstico</div>
                    <div class="input-date">
                        <input type="date" name="data-consulta">
                    </div>
                </div>
                <div class="on-input">
                    <div class="margin-botton-10">Descreva detalhes do diagnóstico</div>
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
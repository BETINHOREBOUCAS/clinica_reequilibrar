<?php $render('header', ['user' => $user]); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <?= $render('information-patient'); ?>

    <div class="register-patient">
        <div class="form-register">
            <div class="on-input">
                <div class="margin-botton-10">Profissional: Bruno Celedonio</div>
            </div>
            <div class="on-input">
                <div class="margin-botton-10">Data: 10/02/2021</div>
            </div>
            <div class="on-input">
                <div class="margin-botton-10">Título: Doença Cronica</div>
            </div>
            <div class="on-input">
                <div class="margin-botton-10">Descrição</div>
                <div>
                    <textarea name="consulta" id="consulta" disabled>Descrição do tipo de doença e etc..</textarea>
                </div>
            </div>
        </div>
    </div>

</div>
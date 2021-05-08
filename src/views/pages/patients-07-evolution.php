<?php $render('header', ['user' => $user]); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <?= $render('information-patient'); ?>

    <?= $render('service-patient'); ?>

    <div class="register-patient">
        <div class="form-register">
            <form method="post">
                <div class="on-input">
                    <div class="margin-botton-10">Data da evolução</div>
                    <div class="input-date">
                        <input type="date" name="data-evolucao">
                    </div>
                </div>
                <div class="on-input">
                    <div class="margin-botton-10">Título</div>
                    <div>
                        <input type="text" name="title-evolucao">
                    </div>
                </div>
                <div class="on-input">
                    <div class="margin-botton-10">Descreva detalhes da evolução</div>
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
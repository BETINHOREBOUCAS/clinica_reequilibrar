<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <?= $render('information-patient'); ?>

    <?= $render('service-patient'); ?>

    <div class="register-patient">
        <div class="form-register">
            <form method="post" enctype="multipart/form-data">
                <div class="on-input">
                    <div class="margin-botton-10">Data do exame</div>
                    <div class="input-date">
                        <input type="date" name="data-exame">
                    </div>
                </div>
                <div class="on-input">
                    <div class="margin-botton-10">Exame</div>
                    <div>
                        <input type="text" name="exam" id="exam">
                    </div>
                </div>
                <hr>
                <div class="on-input">
                    <div class="margin-botton-10">Arquivo</div>
                    <div>
                        <input type="file" name="scan" id="scan">
                    </div>
                </div>
                <hr>
        </div>
        <div class="button-save form-general">
            <button>Salvar</button>
        </div>
        </form>
    </div>



</div>
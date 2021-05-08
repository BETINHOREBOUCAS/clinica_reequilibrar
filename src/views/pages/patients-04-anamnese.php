<?php $render('header', ['user' => $user]); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <?=$render('information-patient');?>

    <?=$render('service-patient');?>

    <div class="register-patient">
            <div class="form-register">
                <form method="post">
                    <div class="on-input">
                        <div class="margin-botton-10">Alergias?</div>
                        <div>
                            <input type="radio" name="alergia"> Sim
                            <input type="radio" name="alergia"> Não
                        </div>
                    </div>
                    <hr>
                    <div class="on-input">
                        <div class="margin-botton-10">Diabetes?</div>
                        <div>
                            <input type="radio" name="diabetes"> Sim
                            <input type="radio" name="diabetes"> Não
                        </div>
                    </div>
                    <hr>
                    <div class="on-input">
                        <div class="margin-botton-10">Hipertensão?</div>
                        <div>
                            <input type="radio" name="hipertensão"> Sim
                            <input type="radio" name="hipertensão"> Não
                        </div>
                    </div>
                    <hr>
                    <div class="on-input">
                        <div class="margin-botton-10">Neoplasia?</div>
                        <div>
                            <input type="radio" name="neoplasia"> Sim
                            <input type="radio" name="neoplasia"> Não
                        </div>
                    </div>
                    <hr>
                    <div class="on-input">
                        <div class="margin-botton-10">Doença Crônica?</div>
                        <div>
                            <input type="radio" name="cronica"> Sim
                            <input type="radio" name="cronica"> Não
                        </div>
                    </div>
                    <hr>
                    <div class="on-input">
                        <div class="margin-botton-10">Fumante?</div>
                        <div>
                            <input type="radio" name="fumante"> Sim
                            <input type="radio" name="fumante"> Não
                        </div>
                    </div>
                    <hr>
                    <div class="on-input">
                        <div class="margin-botton-10">Etilismos?</div>
                        <div>
                            <input type="radio" name="etilismos"> Sim
                            <input type="radio" name="etilismos"> Não
                        </div>
                    </div>
                    <hr>
                    <div class="on-input">
                        <div class="margin-botton-10">Atividade Física?</div>
                        <div>
                            <input type="radio" name="atividade"> Sim
                            <input type="radio" name="atividade"> Não
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
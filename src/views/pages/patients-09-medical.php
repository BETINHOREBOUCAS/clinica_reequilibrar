<?php $render('header', ['user' => $user]); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <?= $render('information-patient'); ?>

    <div class="register">
            <div class="form-register">
                <div class="one-input">
                    <div class="margin-botton-10 main">Anamnese</div>
                    <div class="desc">
                        Alergias? Sim
                    </div>
                    <div class="desc">
                        Diabetes? Sim
                    </div>
                    <div class="desc">
                        Hipertensão? Sim
                    </div>
                    <div class="desc">
                        Neoplasia? Sim
                    </div>
                    <div class="desc">
                        Doença Crônica? Sim
                    </div>
                    <div class="desc">
                        Fumante? Sim
                    </div>
                    <div class="desc">
                        Etilismo? Sim
                    </div>
                    <div class="desc">
                        Atividade Física? Sim
                    </div>
                </div>
                <div class="one-input">
                    <div class="margin-botton-10 main">Consultas</div>
                    <div class="desc">
                        listar Consultas
                    </div>
                </div>
                <div class="one-input">
                    <div class="margin-botton-10 main">Exames Realizados</div>
                    <div class="desc">
                        listar Exames
                    </div>
                </div>
                
                <div class="one-input">
                    <div class="margin-botton-10 main">Diagnóstico</div>
                    <div class="desc">
                        listar Diagnóstico
                    </div>
                </div>
                <div class="one-input">
                    <div class="margin-botton-10 main">Evolução</div>
                    <div class="desc">
                        listar Evolução
                    </div>
                </div>
            </div>
        </div>

</div>
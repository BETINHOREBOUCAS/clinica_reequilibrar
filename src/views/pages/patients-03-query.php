<?php $render('header', ['user' => $user]); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <?= $render('information-patient', $patient); ?>

    <div class="register">
        <div class="form-register">
            <form method="post" enctype="multipart/form-data">
                <div class="on-input">
                    <div class="margin-botton-10">Data da consulta</div>
                    <div class="input-date">
                        <input type="date" name="data_consulta" value="<?= $dataAtual ?? "" ?>">
                    </div>
                </div>
                <div class="padding-responsive on-input">
                    <div class="margin-botton-10">Modalidade</div>
                    <select name="id_modalidade">
                        <option value=""></option>
                        <?php foreach ($modality as $value) : ?>
                            <option value="<?=$value['id'];?>"><?= ucfirst($value['nome']); ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="on-input">
                    <div class="margin-botton-10">Título</div>
                    <div>
                        <input type="text" name="titulo">
                    </div>
                </div>
                <div class="on-input">
                    <div class="margin-botton-10">Descreva detalhes da avaliação</div>
                    <div>
                        <textarea name="descricao"></textarea>
                    </div>
                </div>

                <hr class="new-content">

                <div class="on-input">
                    <h3>Diagnostico</h3>
                    <div class="margin-botton-10">Descreva detalhes do diagnóstico</div>
                    <div>
                        <textarea name="diagnostico"></textarea>
                    </div>
                </div>

                <hr class="new-content">

                <div class="on-input">
                    <h3>Exame</h3>
                    <div class="margin-botton-10">Data do exame</div>
                    <div class="input-date">
                        <input type="date" name="data_exame">
                    </div>
                </div>
                <div class="on-input">
                    <div class="margin-botton-10">Exame</div>
                    <div>
                        <input type="text" name="nome_exame">
                    </div>
                </div>
                <hr>
                <div class="on-input">
                    <div class="margin-botton-10">Arquivo</div>
                    <div>
                        <input type="file" name="scan" id="scan" accept="application/pdf">
                    </div>
                </div>
                
                <hr class="new-content">

                <div class="on-input">
                    <h3>Será realizado tratamento, sessões ou retorno para este paciente?</h3>
                    <div>
                        <input type="radio" name="retorno" value="1"> Sim
                        <input type="radio" name="retorno" value="0" checked> Não
                    </div>
                </div>

                <div class="button-save form-general">
                    <button class="new-content">Finalizar</button>
                </div>
            </form>
        </div>


    </div>



</div>
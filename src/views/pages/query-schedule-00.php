<?php

use src\handlers\PrintHandler;

//PrintHandler::print_r($professional, true);
?>
<?php $render('header', ['user' => $user]); ?>
<?php $render('sidebar'); ?>

<div class="container-area">
    <div class="details">
        <form method="get">
            <div class="form-general">
                <div class="form-responsive">

                    <?php if ($user->permissao == 1) : ?>
                        <div class="item-responsive">
                            <select name="profissional">
                                <option value="0" <?= isset($_GET['profissional']) && empty($_GET['profissional']) ? "selected=selected" : ''; ?>>Profissional</option>
                                <?php foreach ($professional as $value) : ?>
                                    <option value="<?= $value['id']; ?>" <?= isset($_GET['profissional']) && $value['id'] == $_GET['profissional'] ? 'selected=selected' : ''; ?>><?= $value['nome']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    <?php endif ?>

                    <div class="item-responsive">
                        <input type="date" name="dataI" required value="<?= $_GET['dataI'] ?? '' ?>">
                    </div>
                    <span class="span-concat">à</span>
                    <div class="item-responsive">
                        <input type="date" name="dataF" required value="<?= $_GET['dataF'] ?? '' ?>">
                    </div>

                    <div class="button">
                        <button>BUSCAR</button>
                    </div>
                </div>
            </div>
        </form>


    </div>
    <div class="table-style">
        <table>
            <?php if (!empty($agendamentos)) : ?>
                <thead>
                    <tr>
                        <th>Pacinte</th>
                        <th>Profissional</th>
                        <th>Data/Hora</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentos as $value) : ?>

                        <tr>
                            <td><?= $value['paciente']; ?></td>
                            <td><?= $value['profissional']; ?></td>
                            <td><?= date('d/m/Y', strtotime($value['data'])) . ' às ' . $value['hora']; ?></td>
                            <td class="action-icons">
                                <a href="<?= $base; ?>/procedimentos/consulta/<?=$value['id_agendamento'];?>">
                                    <div title="Iniciar Consulta" class="margin-right-10 stethoscope"><i class="fas fa-stethoscope"></i></div>
                                </a>
                                <div title="Cancelar consulta" class="cancel"><i class="fas fa-window-close"></i></div>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            <?php else : ?>
                <div class="margin-left-10">
                    <h3>Nenhum agendamento encontrado!</h3>
                </div>
            <?php endif ?>

        </table>
    </div>
</div>
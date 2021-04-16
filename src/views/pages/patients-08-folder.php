<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <div class="details">
        <form method="get">
            <div class="form-general">
                <div class="form-responsive">
                    <div class="item-responsive">

                        <select name="category">
                            <option>Tipo</option>
                            <option>Consulta</option>
                            <option>Evolução</option>
                        </select>
                    </div>
                    <div class="item-responsive">

                        <select name="category">
                            <option>Profissional</option>
                            <option>Bruno Celedonio</option>
                            <option>Vanessa Silva</option>
                        </select>
                    </div>
                    <div class="item-responsive">
                        <input type="date" name="" id="">
                    </div>

                    <div class="button">
                        <button>BUSCAR</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="button-option">
            <a href="<?= $base; ?>/pacientes/arquivo/prontuario">
                <div class="button-new-function">
                    <span>PRONTUÁRIO</span>
                </div>
            </a>
        </div>
    </div>

    <div class="table-style">
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Tipo de Avaliação</th>
                    <th>Profissional</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10/12/2021</td>
                    <td>Evolução</td>
                    <td>Bruno Celedonio</td>
                    <td class="td-width">
                        <div class="action-icons">
                            <div><a href="<?= $base; ?>/pacientes/arquivo/informacoes"><i class="fas fa-info-circle margin-right-10"></i></a></div>
                            <div><a href="<?= $base; ?>/pacientes/arquivo/informacoes/editar"><i class="fas fa-edit margin-right-10"></i></a></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>10/12/2021</td>
                    <td>Evolução</td>
                    <td>Bruno Celedonio</td>
                    <td class="td-width">
                        <div class="action-icons">
                            <div><a href="<?= $base; ?>/pacientes/arquivo/informacoes"><i class="fas fa-info-circle margin-right-10"></i></a></div>
                            <div><a href="<?= $base; ?>/pacientes/arquivo/informacoes/editar"><i class="fas fa-edit margin-right-10"></i></a></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
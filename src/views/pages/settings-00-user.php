<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <div class="details">
        <form method="get">
            <div class="form-general">
                <div class="form-responsive">
                    <div class="item-responsive">
                        <input type="text" name="search" placeholder="Nome ou CPF...">
                    </div>
                    <div class="item-responsive">
                        <label for=""><i class="fas fa-filter"></i></label>
                        <select name="category">
                            <option>Situação</option>
                            <option>Ativo</option>
                            <option>Inativo</option>
                        </select>
                    </div>

                    <div class="button">
                        <button>BUSCAR</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="button-option">
            <a href="<?= $base; ?>/configuracao/usuarios/novo">
                <div class="button-new-function">
                    <i class="fas fa-user-plus"></i> <span>NOVO USUÁRIO</span>
                </div>
            </a>
        </div>
    </div>

    <?php if(!empty($notice)) :?>
    <?= $render('warning', ['notice' => $notice, 'code' => $code]);?>
    <?php endif ?>

    <div class="table-style">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Permição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bruno Celedonio</td>
                    <td>adm</td>
                    <td><i class="fas fa-user-edit"></i></td>
                </tr>
                <tr>
                    <td>Bruno Celedonio</td>
                    <td>adm</td>
                    <td><i class="fas fa-user-edit"></i></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
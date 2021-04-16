<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

<div class="details">
        <form method="get">
            <div class="form-general">
                <div class="form-responsive">
                    <div class="item-responsive">
                        <input type="text" name="search" placeholder="Nome...">
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
            <a href="javascript:;" onclick="openModal('despesa')">
                <div class="button-new-function">
                    <span>NOVA MODALIDADE</span>
                </div>
            </a>
        </div>
    </div>

    <div class="table-style">
        <table>
            <thead>
                <tr>
                    <th>Modalidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pilates</td>
                    <td><i class="fas fa-edit"></i></td>
                </tr>
                <tr>
                    <td>Massagem</td>
                    <td><i class="fas fa-edit"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>

<?= $render('modal-modality');?>
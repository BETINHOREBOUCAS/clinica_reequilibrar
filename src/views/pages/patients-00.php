
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
                        <select name="situation">
                            <option value="1">Ativos</option>
                            <option value="0">Inativos</option>
                        </select>
                    </div>
                    
                    <div class="button">
                        <button>BUSCAR</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="button-option">
            <a href="<?=$base;?>/pacientes/cadastro">
                <div class="button-new-function">
                    <i class="fas fa-user-plus"></i> <span>NOVO PACIENTE</span>
                </div>
            </a>
        </div>
    </div>

    <?php if(!empty($notice)) :?>
    <?= $render('warning', $notice);?>
    <?php endif ?>

<?php if(!empty($patients)) :?>
    <div class="table-style">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>WhatsApp</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($patients as $value) :?>
                <tr>
                    <td><?=$value['nome'];?></td>
                    <td><?=$value['cpf'];?></td>
                    <td><?=$value['endereco'];?></td>
                    <td><?=$value['whatsapp'];?></td>
                    <td class="td-width">
                        <div class="action-icons">
                            <div><a href="<?=$base;?>/pacientes/agendamento/<?=$value['id'];?>"><i class="fas fa-calendar-alt margin-right-10"></i></a></div>

                            <!-- Não sendo usado -->
                            <div style="display: none;"><a href="<?=$base;?>/pacientes/procedimentos/consulta"><i class="fas fa-folder-plus margin-right-10"></i></a></div>
                            <!-- Fim -->

                            <div><a href="<?=$base;?>/pacientes/arquivo"><i class="fas fa-folder-open margin-right-10"></i></a></div>

                            <div><a href=""><i class="fas fa-user-edit margin-right-10"></i></a></div>

                            <div><a href=""><i class="fas fa-minus-circle margin-right-10"></i></a></div>

                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php endif ?>
</div>

<?php if(isset($qtdPage) && ($qtdPage > 1)) :?>
<?=$render('pagination', ['qtdPage' => $qtdPage, 'search' => $search]);?>
<?php endif ?>
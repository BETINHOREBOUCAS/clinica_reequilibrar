<?php
$url = explode("/", $_GET['request'] ?? $_GET['request'] = '');
?>

<div class="details">
    <form method="get">
        <div class="form-general">
            <div class="form-responsive">
                <div class="item-responsive">
                    <input type="text" name="" id="" placeholder="Pesquisar por descrição...">
                </div>
                <div class="item-responsive">
                    <input type="date" name="" id="">
                </div>
                <span class="span-concat">à</span>
                <div class="item-responsive">
                    <input type="date" name="" id="">
                </div>

                <div class="button">
                    <button>BUSCAR</button>
                </div>
            </div>
        </div>
    </form>

    <?php if(in_array(('contas-a-pagar'), $url)) :?>

    <div class="button-option" onclick="openModal('despesa')">
        <a href="javascript:;">
            <div class="button-new-function">
                <i class="fas fa-plus-square"></i> <span>INCLUIR DESPESA</span>
            </div>
        </a>
    </div>

    <?php elseif(in_array(('contas-a-receber'), $url)) :?>

        <div class="button-option" onclick="openModal('receitas')">
        <a href="javascript:;">
            <div class="button-new-function">
                <i class="fas fa-plus-square"></i> <span>INCLUIR RECEITA</span>
            </div>
        </a>
    </div>

    <?php endif ?>
</div>
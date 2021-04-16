<?php
$url = explode("/", $_GET['request'] ?? $_GET['request'] = '');
?>

<?php if(in_array('fluxo-de-caixa', $url)) :?>

<div class="details">
    <div class="icon-exhibition">
        <i class="fas fa-exchange-alt"></i>
    </div>
    <div class="title-info">
        <h1>Movimentações</h1>
    </div>
</div>

<?php elseif(in_array(('contas-a-pagar'), $url)) :?>

<div class="details">
    <div class="icon-exhibition">
    <i class="fas fa-money-bill-alt"></i>
    </div>
    <div class="title-info">
        <h1>Contas a Pagar</h1>
    </div>
</div>

<?php elseif(in_array(('contas-a-receber'), $url)) :?>

<div class="details">
    <div class="icon-exhibition">
    <i class="fas fa-hand-holding-usd"></i>
    </div>
    <div class="title-info">
        <h1>Contas a Receber</h1>
    </div>
</div>

<?php endif ?>
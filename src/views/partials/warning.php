<?php if ($code == 0) :?>
   
<div class="div-warning">
    <div class="div-warning-content" style="border-color:#F98A89;">
        <div class="div-warning-icon" style="background-color: #F98A89;">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="div-warning-text" style="background-color: #FFF5F5;">
            <h4 style="margin: 0;">Erro: </h4> <?=$notice;?>
        </div>
    </div>
</div>

<?php elseif($code == 1) :?>

<div class="div-warning">
    <div class="div-warning-content" style="border-color:#ffcc43;">
        <div class="div-warning-icon" style="background-color: #ffcc43;">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="div-warning-text" style="background-color: #FFF9F0;">
            <h4 style="margin: 0;">Aviso: </h4> <?=$notice;?>
        </div>
    </div>
</div>

<?php elseif($code == 2) :?>

<div class="div-warning">
    <div class="div-warning-content" style="border-color:#A7D2A4;">
        <div class="div-warning-icon" style="background-color: #A7D2A4;">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="div-warning-text" style="background-color: #F0F9EF;">
            <h4 style="margin: 0;">Sucesso: </h4> <?=$notice;?>
        </div>
    </div>
</div>

<?php endif ?>
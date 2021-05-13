<?php
$url = explode("/", $_GET['request'] ?? $_GET['request'] = '');
?>
<div>
    <div class="list-service">
        <a href="<?= $base.'/procedimentos/consulta/'.$idAgendamento ?>">
            <div <?= in_array('consulta', $url) ? "class='border-active'" : ''; ?>>Consulta</div>
        </a>
        <a href="<?= $base. '/procedimentos/anamnese/'.$idAgendamento ?>">
            <div <?= in_array('anamnese', $url) ? "class='border-active'" : ''; ?>>Anamnese</div>
        </a>
        <a href="<?= $base. '/procedimentos/exames/'.$idAgendamento ?>">
            <div <?= in_array('exames', $url) ? "class='border-active'" : ''; ?>>Exames</div>
        </a>
        <a href="<?= $base. '/procedimentos/diagnostico/'.$idAgendamento ?>">
            <div <?= in_array('diagnostico', $url) ? "class='border-active'" : ''; ?>>Diagnóstico</div>
        </a>
        <a href="<?= $base. '/procedimentos/evolucao/'.$idAgendamento ?>">
            <div <?= in_array('evolucao', $url) ? "class='border-active'" : ''; ?>>Evolução</div>
        </a>
    </div>
</div>
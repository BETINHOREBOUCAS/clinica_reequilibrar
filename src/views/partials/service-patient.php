<?php
$url = explode("/", $_GET['request'] ?? $_GET['request'] = '');
?>
<div>
    <div class="list-service">
        <a href="<?= $base; ?>/pacientes/procedimentos/consulta">
            <div <?= in_array('consulta', $url) ? "class='border-active'" : ''; ?>>Consulta</div>
        </a>
        <a href="<?= $base; ?>/pacientes/procedimentos/anamnese">
            <div <?= in_array('anamnese', $url) ? "class='border-active'" : ''; ?>>Anamnese</div>
        </a>
        <a href="<?= $base; ?>/pacientes/procedimentos/exames">
            <div <?= in_array('exames', $url) ? "class='border-active'" : ''; ?>>Exames</div>
        </a>
        <a href="<?= $base; ?>/pacientes/procedimentos/diagnostico">
            <div <?= in_array('diagnostico', $url) ? "class='border-active'" : ''; ?>>Diagnóstico</div>
        </a>
        <a href="<?= $base; ?>/pacientes/procedimentos/evolucao">
            <div <?= in_array('evolucao', $url) ? "class='border-active'" : ''; ?>>Evolução</div>
        </a>
    </div>
</div>
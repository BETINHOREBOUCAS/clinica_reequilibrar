<?php
if (isset($_GET['p'])) {
    $page = filter_input(INPUT_GET, 'p', FILTER_VALIDATE_INT);
} else {
    $page = 1;
}

function somar($page, $qtdPage) {
    $result = $page + 1;
    if ($page >= $qtdPage) {
        return $page;
    } else {
        return $result;
    }
}

function sub($page) {
    $result = $page - 1;
    if ($page <= 1) {
        return $page;
    } else {
        return $result;
    }
}

?>
<div class="page">
    <a href="?<?="search=".$search['name']."&situation=".$search['situation']."&p=".sub($page) ?>">
        <div style="width: 100px;" class="block">anterior</div>
    </a>
    
    <div>Página <?= $page; ?> de <?= $qtdPage; ?></div>

    <a href="?<?="search=".$search['name']."&situation=".$search['situation']."&p=".somar($page, $qtdPage) ?>">
        <div style="width: 100px;" class="block">próxima</div>
    </a>
</div>
<?php
$url = explode("/", $_GET['request'] ?? $_GET['request'] = '');
?>
<aside>
    <div class="sidebar" id="sidebar">
        <div class="logo">
            Clínica Reequilibrar
        </div>
        <div class="list">
            <ul>
                <a href="<?= $base; ?>/">
                    <li <?= empty($_GET['request']) ? "class='active'" : ''; ?>><i class="fas fa-home"></i><span>Início</span></li>
                </a>
                <a href="<?= $base; ?>/pacientes">
                    <li <?= in_array('pacientes', $url) ? "class='active'" : ''; ?>><i class="fas fa-user-injured"></i> <span>Pacientes</span></li>
                </a>
                <a href="<?= $base; ?>/consultas">
                    <li <?= in_array('consultas', $url) ? "class='active'" : ''; ?>><i class="fas fa-book-medical"></i> <span>Consultas</span></li>
                </a>
                <a href="<?= $base; ?>/agenda">
                    <li <?= in_array('agenda', $url) ? "class='active'" : ''; ?>><i class="fas fa-calendar-alt"></i> <span>Agenda</span></li>
                </a>
                <a href="javascript:;">
                    <li>
                        <div id="financeiro"><i class="fas fa-hand-holding-usd"></i><span>Financeiro</span>
                        </div>
                        <div class="container-item">
                            <div class="sub-list slide-none" id="slide-financeiro">
                                <ul>
                                    <a href="<?= $base; ?>/financeiro/fluxo-de-caixa"  class="finances">
                                        <li <?= in_array('fluxo-de-caixa', $url) ? "class='active'" : ''; ?>>Fluxo de Caixa</li>
                                    </a>

                                    <a href="<?= $base; ?>/financeiro/contas-a-pagar"  class="finances">
                                        <li <?= in_array('contas-a-pagar', $url) ? "class='active'" : ''; ?>>Contas a Pagar</li>
                                    </a>

                                    <a href="<?= $base; ?>/financeiro/contas-a-receber"  class="finances">
                                        <li <?= in_array('contas-a-receber', $url) ? "class='active'" : ''; ?>>Contas a Receber</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </li>
                </a>
                <!-- CODIGO NÃO SENDO UTILIZADO -->
                <a href="javascript:;" style="display: none;">
                    <li style="display: none;">
                        <div id="relatorio"><i class="fas fa-chart-pie"></i><span>Relatórios</span></div>
                        <div class="container-item">
                            <div class="sub-list slide-none" id="slide-relatorio">
                                <ul>
                                    <a href="" class="report">
                                        <li>Atendimentos</li>
                                    </a>
                                    <a href="" class="report">
                                        <li>Financeiro</li>
                                    </a>
                                    <a href="" class="report">
                                        <li>Procedimentos</li>
                                    </a>
                                    <a href="" class="report">
                                        <li>Pacientes</li>
                                    </a>
                                    <a href="" class="report">
                                        <li>Profissional</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </li>
                </a>
                <!-- FIM DE CODIGO NÃO SENDO UTILIZADO -->
                <a href="javascript:;">
                    <li>
                        <div id="config"><i class="fas fa-cog"></i><span>Configurações</span></div>
                        <div class="container-item">
                            <div class="sub-list slide-none" id="slide-config">
                                <ul>
                                <a href="<?=$base;?>/configuracao/usuarios" class="settings">
                                        <li <?= in_array('geral', $url) ? "class='active'" : ''; ?>>Geral</li>
                                    </a>
                                    <a href="<?=$base;?>/configuracao/usuarios" class="settings">
                                        <li <?= in_array('usuarios', $url) ? "class='active'" : ''; ?>>Usuários</li>
                                    </a>
                                    <a href="<?=$base;?>/configuracao/modalidades" class="settings">
                                        <li <?= in_array('modalidades', $url) ? "class='active'" : ''; ?>>Modalidades</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </li>
                </a>
            </ul>
        </div>
    </div>
</aside>

<?= $render('scripts'); ?>
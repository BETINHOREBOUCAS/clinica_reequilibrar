<?php
    if (empty($_GET['mes'])) {
        $mesAnterior = $mes-1;
        $mesPosterior = $mes+1;
    } else {
        $mesAnterior = $_GET['mes'] - 1;
        $mesPosterior = $_GET['mes'] + 1;
    }
    
?>

<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="information">
    <div class="info-alert-basic">
        <div class="item margin-right-5">
            <div class="alert-warnings">
                <div class="icons">
                    <div class="not2">1</div>
                    <div class="icon icon-style2"><i class="far fa-bell"></i></div>
                </div>
                <div class="text">
                    <div>Avisos</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="alert-agends">
                <div class="icons">
                    <div class="not">1</div>
                    <div class="icon icon-style"><i class="far fa-calendar"></i></div>
                </div>
                <div class="text">
                    <div>Agend. Hoje</div>
                </div>
            </div>

        </div>
    </div>

    <div class="info-accounts">
        <div class="item attendance">
            <div class="title">Últimos atendimentos</div>
            <hr>
            <div>
                <table>
                    <thead style="border-bottom: #757575 1px solid;">
                        <tr>
                            <th>Data</th>
                            <th>Paciente</th>
                            <th>Profissional</th>
                        </tr>

                    </thead>

                    <tbody>
                        <tr style="border-bottom: #757575 1px solid;">
                            <td>10/03/2021</td>
                            <td>Francisco Chico Pedro</td>
                            <td>Bruno Celedonio</td>
                        </tr>
                        <tr style="border-bottom: #757575 1px solid;">
                            <td>10/03/2021</td>
                            <td>Marcos</td>
                            <td>Bruno Celedonio</td>
                        </tr>
                        <tr style="border-bottom: #757575 1px solid;">
                            <td>10/03/2021</td>
                            <td>Francisco</td>
                            <td>Bruno Celedonio</td>
                        </tr>
                        <tr style="border-bottom: #757575 1px solid;">
                            <td>10/03/2021</td>
                            <td>Maria</td>
                            <td>Bruno Celedonio</td>
                        </tr>
                        <tr style="border-bottom: #757575 1px solid;">
                            <td>10/03/2021</td>
                            <td>José</td>
                            <td>Bruno Celedonio</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<div class="information">
    <div class="item report">
        <div class="calendar-month">
            
            <div class="month"><input type="month" name="" id="" value="<?=$ano.'-'.$mes;?>"></div>
            
        </div>
        <div class="calendar-day">
            <table>
                <thead>
                    <tr>
                        <th>D</th>
                        <th>S</th>
                        <th>T</th>
                        <th>Q</th>
                        <th>Q</th>
                        <th>S</th>
                        <th>S</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($l = 0; $l < $linhas; $l++) : ?>
                        <tr>
                            <?php for ($q = 0; $q < 7; $q++) : ?>
                                <?php
                                $w = date('d', strtotime(($q + ($l * 7)) . ' days', strtotime($data_inicio)));
                                $m = date('m', strtotime(($q + ($l * 7)) . ' days', strtotime($data_inicio)));
                                ?>
                                <?php if ($m == $mes) : ?>
                                    <td><?= $w; ?></td>
                                <?php else : ?>
                                    <td></td>
                                <?php endif ?>
                            <?php endfor ?>
                        </tr>
                    <?php endfor ?>
                </tbody>

            </table>
        </div>
    </div>
    <div class="item report graphic">
        <div id="columnchart_material" style="width: 100%; height: 100%; font-size:13px;padding:20px;"></div>
    </div>
</div>
</div>

<script src="<?= $base; ?>/assets/js/graphic.js?<?= filemtime('assets/js/graphic.js'); ?>"></script>
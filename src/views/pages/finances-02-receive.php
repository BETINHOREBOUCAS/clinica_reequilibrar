<?php $render('header'); ?>
<?php $render('sidebar'); ?>

<div class="container-area">

    <?= $render('information-money'); ?>

    <?= $render('form-money');?>

    <div class="table-style">
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10/12/2021</td>
                    <td>Evolução</td>
                    <td>Receitas</td>
                    <td>R$ 10,00</td>
                </tr>
                <tr>
                    <td>10/12/2021</td>
                    <td>Evolução</td>
                    <td>Receitas</td>
                    <td>R$ 10,00</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<?= $render('modal-pay');?>
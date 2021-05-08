<?php $render('header', ['user' => $user]); ?>
<?php $render('sidebar'); ?>

<div class="container-area">
    <div class="details">
        <form method="get">
            <div class="form-general">
                <div class="form-responsive">
                    <div class="item-responsive">
                        <select name="category">
                            <option>Profissional</option>
                            <option>Ativo</option>
                            <option>Inativo</option>
                        </select>
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

        
    </div>
    <div class="table-style">
        <table>
            <thead>
                <tr>
                    <th>Pacinte</th>
                    <th>Profissional</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Betinho francisco adalberto reboucas filho</td>
                    <td>Raimundo Franbcisco</td>
                    <td>Avaliação</td>
                    <td>R$ 100,00</td>
                </tr>
                <tr>
                    <td>Betinho</td>
                    <td>Raimundo Franbcisco</td>
                    <td>Avaliação</td>
                    <td>R$ 100,00</td>
                </tr>
                <tr>
                    <td>Betinho</td>
                    <td>Raimundo Franbcisco</td>
                    <td>Avaliação</td>
                    <td>R$ 100,00</td>
                </tr>
                <tr>
                    <td>Betinho</td>
                    <td>Raimundo Franbcisco</td>
                    <td>Avaliação</td>
                    <td>R$ 100,00</td>
                </tr>
                <tr>
                    <td>Betinho</td>
                    <td>Raimundo Franbcisco</td>
                    <td>Avaliação</td>
                    <td>R$ 100,00</td>
                </tr>
                <tr>
                    <td>Betinho</td>
                    <td>Raimundo Franbcisco</td>
                    <td>Avaliação</td>
                    <td>R$ 100,00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
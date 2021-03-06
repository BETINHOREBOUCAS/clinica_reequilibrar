<?php $render('header', ['user' => $user]); ?>
<?php $render('sidebar'); ?>

<div class="container-area">
    
    <div class="details">
        <div class="icon-exhibition">
            <i class="far fa-user"></i>
        </div>
        <div class="title-info">
            <h2>Novo Cadastro</h2>
        </div>
    </div>

    <div>
        <div class="list-service">
            <a href="">
                <div class="border-active">Dados Pessoais</div>
            </a>
        </div>
    </div>

    <div class="form-register">
        <form method="post">
        <div class="input-flex padding-responsive">
                <div class="margin-right-10">
                
                    <label>
                        Nome <br> <input type="text" name="name" required>
                    </label>
                </div>
                <div class="margin-right-10">
                    <label>
                        E-mail <br> <input type="email" name="email" required>
                    </label>
                </div>
                <div>
                    <label>
                        Senha <br> <input type="password" name="password" required>
                    </label>
                </div>
            </div>

            <div class="input-flex">
                <div class="margin-right-10">
                    <label>
                        CPF <br> <input type="text" name="cpf">
                    </label>
                </div>
                <div class="margin-right-10 padding-responsive">
                    <label>
                        Dt. Nascimento <br> <input type="text" name="birth">
                    </label>
                </div>
                <div class="padding-responsive">
                    <label>
                        Sexo <br>
                        <select name="genre">
                            <option value=""></option>
                            <option>Feminino</option>
                            <option>Masculino</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="input-flex">
                <div class="margin-right-10">
                    <label>
                        CEP <br> <input type="text" name="cep">
                    </label>
                </div>
                <div class="margin-right-10 padding-responsive">
                    <label>
                        Endere??o <br> <input type="text" name="address">
                    </label>
                </div>
                <div class="padding-responsive">
                    <label>
                        Numero <br> <input type="text" name="number">
                    </label>
                </div>
            </div>
            <div class="input-flex">
                <div class="margin-right-10">
                    <label>
                        Celular <br> <input type="text" name="cell" autocomplete="off">
                    </label>
                </div>
                <div class="padding-responsive">
                    <label>
                        WhatSapp <br> <input type="text" name="whatsapp" autocomplete="off">
                    </label>
                </div>
            </div>

            <div class="on-input padding-responsive">
                <label>
                    Permiss??o <br>
                    <select name="permission">
                        <option>Administrador</option>
                        <option>Profissional</option>
                        <option>Atendente</option>
                    </select>
                </label>
            </div>
            <div class="button-save form-general">
                <button>Salvar</button>
            </div>
        </form>
    </div>
</div>
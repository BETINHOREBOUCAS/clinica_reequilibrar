<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/login.css?<?= filemtime('assets/css/login.css'); ?>">
    <link rel="shortcut icon" href="<?=$base;?>/assets/images/logo.jpeg" type="image/x-icon">
    <title>Requilibrar</title>
</head>

<body>
    <div class="container">

        <div class="form-login">
            <div>
                <h1>Login</h1>
                <form method="post">
                    <div class="input-login">
                        <input type="text" name="user" placeholder="E-mail"> <br> <br>
                        <input type="password" name="password" placeholder="Senha">
                    </div>
                    <div class="info">
                        <div class="remember">
                            <label>
                            <input type="checkbox" name="remember" value="true">
                            <span>Manter-me logado</span>
                            </label>
                        </div>
                        <div class="forgot-password">
                            <a href="#">Esqueci minha senha?</a>
                        </div>
                    </div>
                    <div class="div-btn">
                        <input type="submit" value="Entrar" class="btn-login">
                    </div>
                </form>
                <br>
                <div class="register">
                    <a href="#">Cadastre-se</a>
                </div>
            </div>
        </div>

        <div class="illustrative-login">
            <div>
                <img src="<?= $base; ?>/assets/images/account.svg">
            </div>
        </div>
        <div class="indication">
            <a href="https://storyset.com/user" target="_blank">Illustration by Freepik Storyset</a>
        </div>

    </div>
</body>

</html>
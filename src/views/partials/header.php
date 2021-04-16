<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?=$base;?>/assets/images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/all.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/styleall.css?<?= filemtime('assets/css/styleall.css');?>">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/home.css?<?= filemtime('assets/css/home.css');?>">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/schedule.css?<?= filemtime('assets/css/schedule.css');?>">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Reequilibrar</title>
</head>
<body>
    <header>
        <div class="menu">

            <div class="menu-icon" id="menu-icon">
                <div>
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <div class="user">
                <ul>
                    <li>
                        Bruno Celedonio <span><i class="fas fa-caret-down"></i></span>
                        <div class="option">
                            <a href=""><i class="fas fa-sign-out-alt"></i> Sair</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </header>
</body>
</html>
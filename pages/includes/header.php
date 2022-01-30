<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/53f10bde57.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>css/style.css">
    <title>Loja Virtual</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo"><a href="<?php echo INCLUDE_PATH;?>">Loja Virtual</a></div>
            <nav class="desktop">
                <ul>
                    <li><a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i>Carrinho(<?php echo \models\homeModel::getTotalCarrinho();?>)</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>finalizar">Finalizar Pedido</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </header>
    <base base="<?php echo INCLUDE_PATH;?>"></base>

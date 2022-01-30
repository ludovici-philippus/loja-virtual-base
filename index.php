<?php include('config.php');?>
<?php require('./vendor/autoload.php')?>
<?php Site::update_usuario_online();
Site::contador();

$homeController = new controller\homeController();
$finalizarController = new controller\finalizarController();

Router::get('', function() use ($homeController){
    $homeController->index();
});
Router::get("/finalizar", function() use ($finalizarController){
    $finalizarController->index();
});
?>

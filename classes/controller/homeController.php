<?php 
    namespace controller;

    class homeController{
        public function index(){
            if(isset($_GET['addCart'])){
                $id_produto = (int)$_GET['addCart'];
                if(isset($_SESSION['carrinho']) == false){
                    $_SESSION['carrinho'] = array();
                }

                if(isset($_SESSION['carrinho'][$id_produto]) == false){
                    $_SESSION["carrinho"][$id_produto] = 1;
                }else{
                    $_SESSION['carrinho'][$id_produto]++;
                }
                \Painel::redirect_to(INCLUDE_PATH);
            } 
            \views\mainView::render("pages/home.php");
        }
    }
    
?>
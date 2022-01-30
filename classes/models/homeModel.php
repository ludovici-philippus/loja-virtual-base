<?php 
    namespace models;

    class homeModel{
        public static function getLojaItems(){
            $sql = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque`");
            $sql->execute();
            return $sql->fetchAll();
        }
        
        public static function getTotalCarrinho(){
            $amount = 0;
            if(isset($_SESSION['carrinho'])){
                foreach ($_SESSION['carrinho'] as $key => $value) {
                    $amount += $value;
                }
            }
            return $amount;
        }
    }
?>
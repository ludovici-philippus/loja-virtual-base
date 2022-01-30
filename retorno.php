<?php 
    include("./config.php");
    if(isset($_POST['notificationType']) && $_POST['notificationType'] == "transaction"){
        $email = "202luisfelipe@gmail.com";
        $token = "4641F142D31142338E92331531974257";

        $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/".$_POST['notificationCode']."?email=".$email."&token=".$token;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $transaction = curl_exec($curl);
        curl_close($curl);

        if($transaction == "Unauthorized"){
            die("Um erro ocorreu!");
        }

        $transaction = simplexml_load_string($transaction);
        $transactionStatus = $transaction->status;
        if($transactionStatus == 1){
            $transactionStatus = "Aguardando Resposta";
        }else if($transactionStatus == 2){
            $transactionStatus = "Em análise";
        }else if($transactionStatus == 3){
            $transactionStatus = "Paga";
            $reference_id = $transaction->reference;
            $MySql::conectar()->exec("UPDATE `tb_admin.pedidos` SET status = 'pago' WHERE reference_id = $reference_id");
        }else if($transactionStatus == 4){
            $transactionStatus = "Disponível";
        }else if($transactionStatus == 5){
            $transactionStatus = "Em Disputa";
        }else if($transactionStatus == 6){
            $transactionStatus = "Devolvida";
        }else if($transactionStatus == 7){
            $transactionStatus = "Cancelada";
        }
    }
?>
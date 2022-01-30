<div class="chamada-escolher">
    <div class="container">
        <h2>Feche o seu pedido!</h2>
    </div>
</div>

<div class="tabela-pedidos">
    <div class="container">
        <h2><i class="fa fa-shopping-cart"></i>Carrinho: </h2>
        <table>
            <tr>
                <td>Nome do produto</td>
                <td>Quantidade</td>
                <td>Valor</td>
            </tr>
            <?php 
                $items_carrinho = $_SESSION['carrinho'];
                $total = 0;
                foreach ($items_carrinho as $key => $value) {
                    $id_produto = $key;
                    $produto = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE id = $id_produto");
                    $produto->execute();
                    $produto = $produto->fetch();
            ?>
            <tr>
                <td><?php echo $produto['nome'];?></td>
                <td><?php echo $value;?></td>
                <td>R$ <?php echo $produto['preco'] * $value;?></td>
            </tr>
            <?php $total += $value * $produto['preco'];}?>
        </table>
    </div>
</div>
<div class="finalizar-pedido">
    <div class="container">
        <h2>Total: R$ <?php echo $total;?></h2>
        <div class="clear"></div>
        <a class="btn-pagamento" href="">Pagar agora!</a>
        <div class="clear"></div>
    </div>
</div>

<script src="<?php echo INCLUDE_PATH;?>js/jquery.js"></script>
<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<script src="<?php echo INCLUDE_PATH;?>js/constants.js"></script>
<script src="<?php echo INCLUDE_PATH;?>js/scripts.js"></script>
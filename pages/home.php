<div class="chamada-escolher">
    <div class="container">
        <h2>Escolha seus produtos, compre agora!</h2>
    </div>
</div>

<div class="lista-items">
    <div class="container">
        <?php 
            $items = \models\homeModel::getLojaItems();
            $imagem = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens`");
            $imagem->execute();
            $imagens = $imagem->fetchAll();
            foreach ($items as $key => $value) {
                foreach ($imagens as $key2 => $value2) {
                    if($value2['produto_id'] == $value['id']){
                        $imagem = $value2['imagem'];
                        break;
                    }
                }
        ?>
        <div class="produto-single-box">
            <img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $imagem;?>">
            <p>Preço: R$ <?php echo $value['preco'];?></p>
            <a href="<?php echo INCLUDE_PATH;?>?addCart=<?php echo $value['id'];?>">Adicionar ao carrinho!</a>
        </div>
        <?php }?>
    </div>
</div>


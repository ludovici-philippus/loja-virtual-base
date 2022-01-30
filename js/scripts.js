$(function(){
    $("a.btn-pagamento").click(function(e){
        e.preventDefault();
        $.ajax({
            url:include_path+"ajax/finalizarPagamento.php"
        }).done(function(data){
            let isOpenLightBox = PagSeguroLightbox({
                code:data
            },{
                success: function(transactionCode){
                    console.log("O usuário foi até o final!");
                },
                abort: function(){
                    console.log("Fechou a janela");
                }
            })    
        })
    });
})
<?php
    $data = date("y-m-d");
    $dadosvenda = array("id_cliente" => $idcliente,"data_venda" => $data,"pago" =>'N');

    $venda = inserir("venda", $dadosvenda,true);

    $lst_carrinho = consultar("carrinho"," id_pedido = $idpedido");

    foreach ($lst_carrinho as $carrinho){
        $subtotal = $carrinho["valor"] * $carrinho["qtde"];
        inserir("itens", array("id_venda" => $venda,"id_produto" => $carrinho["id_produto"],
                               "valor_item" => $carrinho["valor"], "qtde_item" =>$carrinho["qtde"],
                                "subtotal" =>$subtotal));
    }
    $email = @$_SESSION["LJCLIENTE"]["email"];
    $headers = "From: seneakerstore";
    $assunto = "Fale conosco";
    $msg = "Valor a ser pago : $subtotal na conta ############# ";
    $corpoemail = 'Fale conosco
                    
                    Nome: ' .@$_SESSION["LJCLIENTE"]["cliente"].'
                    Email:' .$email.'
                    Assunto: ' .$assunto. '
                    mensagem: ' .$msg.'';
     if(mail("barreto_11almeida@hotmail.com","fale conosco",$corpoemail,$headers)){
         echo "enviado com sucesso";
     }else{
         echo "falha";
     }               

    deletar("carrinho", "id_pedido = $idpedido");
    deletar("pedido", "id_pedido = $idpedido");
    unset($_SESSION["ljpedido"]);
    $idpedido = null;

    echo "<script language='javascript'>window.location.href='". URL_BASE."compra-finalizada'</script>";
?>
<?php
    if((@$idcliente =="") || (is_null(@$idcliente))){
        $url = URL_BASE."nao-logado";
        echo "<script languague='javaScript'> window.location='$url'</script>";
        
    }
    
if(@$idpedido !=""){
?>
<div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php include"menu-lateral.php"?>
	
	<div class="lado-dir">
	<title class="migalha" style=" background: black; color:white; border-color: black;">Confirme seu pedido</title>
	<div class="base-cadastro dados-cliente">
		
		<form action="op_cliente.php" method="post">
		<h1><span>Dados para Entrega</span></h1>	
		
<div class="caixa-carrinho clientes">			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<thead>
	  <tr>
		<th align="center">Nome</th>
		<th align="center">Email</th>
		<th align="center">Endereço</th>
		<th align="center">Bairro</th>
		<th align="center">CEP</th>
		<th align="center">Cidade</th>
		<th align="center">Telefone</th>
		<th align="center">UF</th>
	  </tr>
	  </thead>
	  <tbody>
	  <tr>
		<td><?php echo @$_SESSION["LJCLIENTE"]["cliente"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["email"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["endereco"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["bairro"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["cep"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["cidade"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["fone"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["uf"] ?></td>
	  </tr>
	  <tr>
	    <td colspan="8" align="right"><a href="<?php echo URL_BASE ?>cadastro" class="botao">Alterar dados</a></td>
	    </tr>
	  </tbody>
</table>
</div>			
			
	</form>
	</div>	
	<div class="limpar"></div>
<title class="migalha" style=" background: black; color:white; border-color: black;">Lista de Produtos do seu Carrinho</title>
<div class="base-carrinho lista-carrinho">
			<p>&nbsp;</p>

<div class="caixa-carrinho lista">			
<form action="index.php?link=8" method="post">

<div class="caixa-carrinho">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<thead>
	  <tr>
		<th width="50%" align="center">Produto</th>
		<th width="14%" align="center">Quantidade</th>
		<th width="18%" align="center">Valor unitario</th>
		<th width="18%" align="center">Valor total</th>
	  </tr>
	  </thead>
	  <tbody>
              <?php
                $somatotal = 0;
				$i=0;
				$lst_carrinho = consultar("carrinho c, produto p","c.id_produto = p.id_produto and  id_pedido = $idpedido");
		  		foreach ($lst_carrinho as $carrinho){
					  $subtotal = $carrinho["valor"] * $carrinho["qtde"];
					  $somatotal = $subtotal + $somatotal;                
                    
                ?>
	 	  <tr>
		<td><img src="<?php echo URL_BASE ?>produtos/<?php echo $carrinho["imagem"] ?>" title="<?php echo $carrinho["produto"] ?>" rel="<?php echo $carrinho["produto"] ?>"><?php echo $carrinho["produto"] ?></td>
		<td align="center"><input type="Number" name="textfield" id="textfield" value="<?php echo  $carrinho["qtde"] ?>" class="cont"/></td>
		<td align="center"><h3>R$ <?php echo $carrinho["valor"] ?></h3></td>
		<td align="center">R$ <?php echo $carrinho["valor"] * $carrinho["qtde"] ?></h3></td>
		</tr>
	  	<?php } ?> 
	  	
	</tbody>
</table>
 

    <h3 class="total">Valor Total:  R$ <span id="valorcompra"> <?php echo $somatotal ?></span></h3>
	
	
</form>	
</div>
		
<div class="forma-pagamento lista">
<title class="migalha" style=" background: black; color:white; border-color: black;">Formas de pagamento</title>
<div id="caixa">
			<p id="abas">
				<a href="#aba1" class="selected">Transferência/Depósito</a>
				
								
			</p>

			<ul id="conteudos" class="descricao">	
                            
                            <li id="aba1">
					<strong>DEPÓSITO BANCÁRIO</strong>
					<small>Escolha uma das nossas contas abaixo para realizar o deposito.</small>
					<div class="contas">
						<figure>
							<img src="imagens/img-bb.png">
							<strong>BANCO DO BRASIL</strong> 
							<span>Agência: ##### </span> 
							<span>Conta: ###### </span> 
							<span>#################</span>
						</figure>
						<figure>
							<img src="imagens/img-bi.png">
							<strong>BANCO ITAÚ  </strong> 
							<span>Agência: ###### </span> 
							<span>Conta: ###### </span>  
							<span>############</span> 
						</figure>
						<figure>
							<img src="imagens/img-bc.png">
							<strong>CAIXA ECONÔMICA </strong>
							<span>Operação: ###### </span> 
							<span>Agência: ######</span> 
							<span>Poupança: ##### </span>  
							<span>##############</span>  
						</figure>
						<figure>
							<img src="imagens/img-bbd.png">
							<strong>BANCO BRADESCO </strong>
							<span>Agência: ######## </span> 
							<span>Conta: ####### </span> 
							<span>#########</span>
						</figure>
					</div>
					<a href="<?php echo URL_BASE ."transferencia" ?>" class="paypal" style=" background: black; color:white; border-color: black;">Finalizar Pedido</a>
				</li>
				
				
				
				
			</ul>
		</div>
</div>
	</div>
	</div>
</div>
<?php } else {  ?>
        
        <div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php include"menu-lateral.php"?>
	
	<div class="lado-dir">
	<title class="migalha" style=" background: black; color:white; border-color: black;">Carrinho/ vazio</title>
			
		<!---- carrinho vazio-------->
		<div class="base-carrinho">
			<div class="vazio">
			<img src="<?php echo URL_BASE ."imagens/img-carrinho-vazio.png" ?>">
			<span>
			<h2>Seu carrinho está vazio</h2>
			<a href="<?php echo URL_BASE ?>" style=" background: black; color:white; border-color: black;">Voltar para página inicial</a>
			</span>
			</div>
		</div>
		
</div>
		
</div>
<?php } ?>
</div>


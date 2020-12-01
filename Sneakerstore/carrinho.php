<?php
	$idproduto = strip_tags(filter_input(INPUT_POST, "id_produto"));
	$preco = strip_tags(filter_input(INPUT_POST, "txt_preco"));
	$qtde = strip_tags(filter_input(INPUT_POST, "txt_qtde"));
	$id_cliente = "";

	
	if(($idproduto!="") || ($idproduto!=0)){
		if(($idpedido=="") || ($idpedido==0)){
			$dados= array  ("data_pedido" => date("y-m-d"), "id_cliente" => $idcliente);
			$idpedido = inserir("pedido", $dados, true);

			if($idpedido){
				$_SESSION["ljpedido"] = $idpedido;
			}
		}
        //verifica se o produto já existe no carrinho de compra
		$existe = consultar("carrinho"," id_produto = $idproduto and id_pedido = $idpedido");
		if($existe){
			executar(" UPDATE carrinho SET qtde = qtde +1 WHERE id_produto = $idproduto and id_pedido = $idpedido");
		}else{
			inserir("carrinho", array("id_produto" => $idproduto, "id_pedido" => $idpedido, "valor"=>$preco,"qtde"=>1));
		}
	}
	
	if($idpedido){

		if(@$_POST["atualizar"] == "S"){
			$valores = $_POST["codproduto"];

			//pega a chave do array
			$chave = array_keys($valores);
			for($i=0;$i<sizeof($chave); $i++){
				$indice = $chave[$i];
				if($valores[$indice]["QTDE"]>0){
					alterar("carrinho",array("qtde"=>$valores[$indice]["QTDE"]), "id_produto = ".$valores[$indice]["ID"] . " and id_pedido = $idpedido");
				}
			}
		}
		if(@$_GET["p"]){
			deletar("carrinho", " id_pedido = $idpedido and id_produto =".$_GET["p"]);
		}

		$lst_carrinho = consultar("carrinho c, produto p","c.id_produto = p.id_produto and  id_pedido = $idpedido");

	}

	if(@$lst_carrinho){
?>

<div class="conteudo">
<?php include"menu-lateral.php"?>
<div class="lado-dir">
	<title class="migalha" style=" background: black; color:white; border-color: black;">Lista de Produtos do seu Carrinho</title>
		<div class="base-carrinho">
			<div class="prog1"></div>
			<p>&nbsp;</p>


<div class="caixa-carrinho">			
<form action="" method="post">
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
		  		foreach ($lst_carrinho as $carrinho){
					  $subtotal = $carrinho["valor"] * $carrinho["qtde"];
					  $somatotal = $subtotal + $somatotal;
		  ?>
	  	  <tr>
		<td rowspan="2"><img src="<?php echo URL_BASE ?>produtos/<?php echo $carrinho["imagem"] ?>" title="<?php echo $carrinho["produto"] ?>" rel="<?php echo $carrinho["produto"] ?>"><?php echo $carrinho["produto"] ?></td>
		<td rowspan="2" align="center"><input type="Number" name="codproduto[<?php echo $i ?>][QTDE]" value="<?php echo $carrinho["qtde"] ?>" class="cont"/></td>
		<td rowspan="2" align="center"><h3>R$ <?php echo $carrinho["valor"] ?></h3></td>
		<td align="center"><h3>R$ <?php echo $carrinho["valor"] * $carrinho["qtde"]?></h3></td>
		<input type="hidden" name="codproduto[<?php echo $i ?>][ID]" value="<?php echo $carrinho["id_produto"] ?>">
		<input type="hidden" name="atualizar" value="S">
		</tr>
				  
	  <tr>
	    <td align="center">
			<input type="submit"  value="atualizar">
			<!-- <a href="" class="atualizar">Atualizar </a> -->
			<a href="<?php echo URL_BASE. "carrinho/&p=$carrinho[id_produto]"?>" class="excluir">Excluir</a></td>
		</tr>
		<?php $i++; } ?>
	  	  </tbody>
</table>

<h3 class="total">Valor Total: R$ <?php echo $somatotal ?></h3>
	
<div class="limpar"></div>
<div class="base-btns">
	<a href="<?php echo URL_BASE ?>" class="produtos">ESCOLHER MAIS PRODUTOS</a>
	<div class="botoes">
	<a href="<?php echo URL_BASE ?>pagamento" class="comprar" style=" background: black; color:white; border-color: black;">Finalizar Compra</a>
	</div>
	
</div>


	</form>	
</div>
</div>

<!--Recomendados para você-->	
<div class="recomendamos">
						
						<div class="cx-base-home">
							<h1><span>Recomendados para você</span></h1>
							<?php
								$recomendados = consultar("produto"," id_categoria = ".$lst_carrinho[0]["id_categoria"]
														   ." order by rand() limit 6");
											foreach ($recomendados as $recomendado){
							?>
											<div class="caixa-prod-home quatro-colunas">
								<div class="cx-img">
										<a href="<?php echo URL_BASE ?>produto/&p=41"><img src="<?php echo URL_BASE ?>produtos/<?php echo $recomendado["imagem"]?>"></a>
								</div>
								<div class="limpar"></div>		
									<h2><a href="<?php echo URL_BASE ?>produto/&p=<?php echo $recomendado["id_produto"]?>"><?php echo $recomendado["produto"]?></a></h2>
										<div class="prc-ant">De <small>R$ <?php echo $recomendado["preco_alto"]?></small>&nbsp; Por</div>
											<h3>R$ <?php echo $recomendado["preco"]?></h3>
														
									<div class="cx-botoes">
										<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
											<input name="txt_preco" 	type="hidden" id="txt_preco" value = "<?php echo $recomendado["preco"]?>" />
											<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
											<input type="hidden" 		name="id_produto" value = "<?php echo $recomendado["id_produto"]?>"/>
											<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar" style=" background: black; color:white; border-color: black;" />
										</form>
										<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
									</div>
								</div>	
											<?php } ?>				
												
												
											</div>
						</div>
		
</div>
</div>
	<?php } else{ 
		
		unset($_SESSION["ljpedido"]);
	?>
		<div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php include"menu-lateral.php"?>
	
	<div class="lado-dir">
	<title class="migalha" style=" background: black; color:white; border-color: black;">Carrinho/ vazio</title>
			
		<!---- carrinho vazio-------->
		<div class="base-carrinho">
			<div class="vazio">
			<img src="<?php echo URL_BASE ."imagens/img-carrinho-vazio.png"?>">
			<span>
			<h2 >Seu carrinho está vazio</h2>
			<a href="<?php echo URL_BASE ?>" style=" background: black; color:white; border-color: black;">Voltar para página inicial</a>
			</span>
			</div>
		</div>
		
</div>
		
</div>

	<?php } ?>
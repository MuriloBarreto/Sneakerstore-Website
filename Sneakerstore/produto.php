
<?php
	$idproduto = (int) $_GET["p"];
	$produto = consultar("produto", "id_produto = $idproduto");
?>

<div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php include"menu-lateral.php"?>
	
	<div class="lado-dir">
	<title class="migalha"  style=" background: black; color:white; border-color: black;"><?php echo $produto[0]["produto"]; ?></title>
		<div class="base-detalhes">
		
			<div class="imagem" ><img src="<?php echo URL_BASE ?>produtos/<?php echo $produto[0]["imagem"]; ?>"></div>
			<div class="cx-opcoes">
				<h3"><?php echo $produto[0]["produto"]; ?></h3>
				<div class="cx-preco">
					<span class="preco-antigo">de R$ <?php echo $produto[0]["preco_alto"]; ?></span> <span class="desconto">por apenas</span>
					<h2 style="  color:black;">R$ <?php echo $produto[0]["preco"]; ?></h2>
					<span>em até 7x nos cratões</span>
					<i class="bandeiras"></i>
				</div>
				
				<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
					<input name="txt_preco" 	type="hidden" id="txt_preco" value = "<?php echo $produto[0]["preco"]; ?>" />
					<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
					<input type="hidden" 		name="id_produto" value = "<?php echo $produto[0]["id_produto"]; ?>"/>
					<input type="submit" 		name="imageField" class="carrinho" value="Adicionar ao carrinho" style=" background: black; color:white; border-color: black;" />
				</form>
			</div>
		</div>
		
		<div id="caixa">
			<p id="abas">
				<a href="#aba1" class="selected">descrição</a>
				<a href="#aba2">Detalhes</a>
								
			</p>

			<ul id="conteudos" class="descricao">				
				<li id="aba1">
				  <?php echo $produto[0]["descricao"]; ?>
				</li>
				
				<li id="aba2">
				<?php echo $produto[0]["detalhes"]; ?>
				</li>	
				
							
				
			</ul>
		</div>
		
		<!--Recomendados para você-->	
		<div class="recomendamos">
						
		<div class="cx-base-home">
			<h1><span>Recomendados para você</span></h1>
			<?php
				$recomendados = consultar("produto"," id_categoria = ".$produto[0]["id_categoria"]
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
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  style=" background: black; color:white; border-color: black;"/>
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
				</div>	
							<?php } ?>				
								
								
							</div>
		</div>
		
	</div>
</div>
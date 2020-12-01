		
		<!--banner topo-->
<div class="cx-banner-topo">
       <div class="conteudo">
       <section class="slide">
            <div class="slide_nav">
                <div class="slide_nav_item b"></div>
                <div class="slide_nav_item g"></div>
            </div>
					<?php
						$controle = 2;
						$lst_banners = consultar("banner","ativo = 'S' order by id_banner asc");
						foreach($lst_banners as $lst_banner){
							if($controle == 2){
					?>
            
                <article class="slide_item first">
					<div class="base-bn">
						<a href="<?php echo URL_BASE ?>/<?php echo $lst_banner["url"] ?>"><img src="<?php echo URL_BASE ?>/banner/<?php echo $lst_banner["imagem"] ?>" alt="<?php echo $lst_banner["titulo"] ?>" title="<?php echo $lst_banner["titulo"] ?>"></a>
					</div>    
				</article><?php
				   $controle = 1;
					}else{
				?>
                <article class="slide_item">
					<div class="base-bn">
						<a href="<?php echo URL_BASE ?>/<?php echo $lst_banner["url"] ?>"><img src="<?php echo URL_BASE ?>/banner/<?php echo $lst_banner["imagem"] ?>" alt="<?php echo $lst_banner["titulo"] ?>" title="<?php echo $lst_banner["titulo"] ?>"></a>
					</div>    
				</article><?php
					}}
				?>
				
             
		   
        </section>
		
		<!-- slideshow-->
		<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="<?php echo URL_BASE ?>/js/js.js" async></script>
   </div>
</div>

<!--mais vendidos-->
	
<div class="conteudo">	
	<div class="base-maisvendido">
		<h1><span>Destaques</span></h1>
		<?php
			$lst_destaques = consultar("produto"," destaque = 'S' and ativo_produto = 'S' order by rand() limit 3");
			foreach($lst_destaques as $lst_destaque){
		?>				
		<div class="cx-maisvendido">
			<div class="prod"><a href="<?php echo URL_BASE."produto/&p=".$lst_destaque["id_produto"]?>"><img src="<?php echo URL_BASE ?>/produtos/<?php echo $lst_destaque["imagem"]; ?>"></a></div>
				<div class="del">
				<h2><a href="<?php echo URL_BASE."produto/&p=".$lst_destaque["id_produto"]?>"><?php echo $lst_destaque["produto"]; ?></a></h2>
				<div class="prc-ant">De <small> R$ <?php echo $lst_destaque["preco_alto"]; ?></small><font> Por</font></div>
				<span>R$ <?php echo $lst_destaque["preco"]; ?></span>
				<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>/carrinho">
					<input name="txt_preco" 	type="hidden" id="txt_preco" value = "<?php echo $lst_destaque["preco"]; ?>" />
					<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
					<input type="hidden" 		name="id_produto" value = "<?php echo $lst_destaque["id_produto"] ?>"/>
					<input type="submit" 		name="imageField" class="comprar" value="Comprar" style=" background: black; color:white; border-color: black;" />
				</form>
				<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
				
				</div>
		</div>
			<?php } ?>			
						
		
			</div>
</div>

<div class="conteudo">
<?php include"menu-lateral.php"?>	
<div class="lado-dir">
<div class="base-home">		
	
			
		<!-- com quatro produtos-->	
		<?php
				$lst_categorias = selecionar("select * from categoria where id_categoria in (select distinct id_categoria from produto)"
											 ." order by rand() limit 5");
											 
								foreach ($lst_categorias as $lst_categoria){
			?>
					
		<div class="cx-base-home">
			<h1><span><?php echo $lst_categoria["categoria"] ?></span></h1>

				<?php
					$idcategoria = $lst_categoria["id_categoria"];
					$lst_produtos = consultar("produto","id_categoria = $idcategoria and ativo_produto = 'S' limit 4");
					foreach ($lst_produtos as $lst_produto){
				?>					
							<div class="caixa-prod-home quatro-colunas">
				<div class="cx-img">
				<a href="<?php echo URL_BASE."produto/&p=".$lst_produto["id_produto"]?>"><img src="produtos/<?php echo $lst_produto["imagem"] ?>" title="<?php echo $lst_produto["produto"] ?>"></a>
				</div>		
						<h2><a href="<?php echo URL_BASE."produto/&p=".$lst_produto["id_produto"]?>"><?php echo limita_caracteres($lst_produto["produto"], 40) ?></a></h2>
						<div class="prc-ant">De <small>R$ <?php echo $lst_produto["preco_alto"] ?></small> Por</div>
							<h3>R$ <?php echo $lst_produto["preco"] ?></h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "<?php echo $lst_produto["preco"] ?>" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "<?php echo $lst_produto["id_produto"] ?>"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  style=" background: black; color:white; border-color: black;"/>
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
						<div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="imagens/bandeiras2.png"></div>
					</div>
				</div>		
				<?php }  ?>
		</div>
								<?php }  ?>
						
		
			
			</div>
			
			<?php include"sidebar.php"?>
</div>			
		</div>
</div>
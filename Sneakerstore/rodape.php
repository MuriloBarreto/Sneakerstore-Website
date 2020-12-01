<div class="limpar"></div>
<div class="base-rodape " style=" background:black;">
	<div class="conteudo cx-rodape" style=" background:black;">
	<div class="cx-mr" style=" background:black;">
		<strong>PRODUTOS</strong>
		<?php
			$categorias = consultar("categoria","ativo_categoria='S' ");
			foreach ($categorias as $categoria){
				$id_cat = $categoria["id_categoria"];
		?>
		<ul>
		<li><a href="<?php echo URL_BASE . "categoria/&c=$id_cat"?>"><?php echo $categoria ["categoria"]; ?></a></li>
			  
		</ul>
		<?php } ?>
	</div>
	
	<div class="cx-mr">
		<strong>REDES SOCIAIS</strong>
		<a href="#" class="ico-face">facebook</a>
		<a href="#" class="ico-youtube">youtube</a>
		<a href="#" class="ico-twitter">twitter</a>
		
		<!-- <div class="ico-bandeira"></div> -->
	</div>
	
	</div>
	<div class="copy" style=" background:
grey;">
		<p>Sneakerstore - Copyright 2020</p>
		<p>CNPJ: 0001.110.0002/00</p>
	</div>
</div>
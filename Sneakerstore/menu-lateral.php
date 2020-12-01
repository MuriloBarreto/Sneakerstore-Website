
	<div class="lado-esq">
		<h1 style=" background: black; color:white; border-color: black;">Categorias</h1>

		<?php
			$categorias = consultar("categoria","ativo_categoria='S' ");
			foreach ($categorias as $categoria){
				$id_cat = $categoria["id_categoria"];
		?>
				<ul>
			<h2><a href="<?php echo URL_BASE . "categoria/&c=$id_cat"?>"><?php echo $categoria ["categoria"]; ?></a></h2>
			
			<?php
				$subcategorias = consultar("subcategoria","ativo_subcategoria='S' and id_categoria=$id_cat");
				 if($subcategorias){
					 foreach ($subcategorias as $subcategoria){
						 $url_sub = URL_BASE ."subcategorias/&s=".$subcategoria["id_subcategoria"];
						 echo "<li><a href=$url_sub>$subcategoria[subcategoria] </a></li>";
					 }
				 }
			?>
			</ul>
			<?php } ?>
			  
			  			  
		
		
			
		
	
	</div>
<div class="sidebar cx-base-home">
	<?php
		$lst_anuncios = consultar("anuncio","ativo_anuncio = 'S'");
		foreach($lst_anuncios as $lst_anuncio){
	?>
	
	<a href="<?php echo URL_BASE ?>/<?php echo $lst_anuncio["url"] ?>"><img src="<?php echo URL_BASE ?>imagens/<?php echo $lst_anuncio["imagem"] ?>"></a>
		
	<?php } ?>

	
</div>
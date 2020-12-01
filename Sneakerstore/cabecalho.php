
<div class="mn-topo" style="background: grey;">
	<div class="conteudo" >
		<div class="contato-topo">
				
				<ul class="menu-topo" style=" margin-left: 35%; ">
					<li><a href="<?php echo URL_BASE ?>">HOME	</a></li>  
					<li><a href="<?php echo URL_ADMIN ?>">ADM</a></li>  
					<li><a href="<?php echo URL_BASE ?>/cadastro">cadastrar	</a></li>
					
					<?php
					 if(@$idcliente) {
						 $txtlogin = "SAIR";
						 $urllogin = URL_BASE. "logoff.php";
						 $nomecli = $_SESSION["LJCLIENTE"]["cliente"];
						 $url = "minha_conta";
					 } else{
						$txtlogin = "LOGIN";
						$urllogin = URL_BASE. "login";
						$nomecli = "Visitante";
						$url = "cadastro";
					 }
						  		
					echo "<li><a href= $urllogin >$txtlogin</a></li>";
					?> 
									</ul>
				<a href="<?php echo URL_BASE.$url ?>" title="usuario" class="usuario"><img src="<?php echo URL_BASE ?>/imagens/ico-usuario-topo.png"><p><?php echo @$nomecli ?> </p></a>
		</div>
	</div>
</div>
<div class="base-topo" style="background: black;">

	<div class="conteudo" style="background: black;">
		<a href="<?php echo URL_BASE ?>" title="Sneakerstore" class="logo" style=" "><img src="<?php echo URL_BASE ?>/imagens/sapatos1.jpg"></a>		
		<div class="carrinho-topo" style=" width: -20%">
		<ul>
			
				<li><a href="<?php echo URL_BASE ?>carrinho"><i  class="ico-carrinho"></i> <span style="color: white;">Acesse seu carrinho</span><i ></i></a>
					
				</li>
		</ul>
		</div>
		
	</div>
</div>
<div class="limpar"></div>

<nav class="navmenu">
<a href="#" class="mobmenu" style="background: black;">menu</a>
<div class="cor" >
	<div class="conteudo">
		<ul>
				<!-- mostrar mobile -->
				<a href="<?php echo URL_BASE.$url ?>" title="usuario" class="mostra" ><img src="<?php echo URL_BASE ?>/imagens/ico-usuario-topo.png"><p style=" 
	
	color:#FFF;"><?php echo @$nomecli ?> </p></a>
					<li class="mostra " ><a href="<?php echo URL_BASE ?>"><i class="ico-home"></i>Home	</a></li>  
					<?php
					 if(@$idcliente) {
						 $txtlogin = "SAIR";
						 $urllogin = URL_BASE. "logoff.php";
						 $nomecli = $_SESSION["LJCLIENTE"]["cliente"];
						 $url = "minha_conta";
					 } else{
						$txtlogin = "LOGIN";
						$urllogin = URL_BASE. "login";
						$nomecli = "Visitante";
						$url = "cadastro";
					 }
						  		
					echo "<li class=mostra><a href= $urllogin >$txtlogin</a></li>";
					?> 					
					<li class="mostra"><a href="<?php echo URL_BASE ?>cadastro"><i class="ico-cad"></i>Cadastrar	</a></li>     
					         			
				<?php
					$menu_categorias = consultar("categoria","ativo_categoria = 'S' limit 7");
					foreach ($menu_categorias as $menu_categoria){
						$id_menu_cat = $menu_categoria["id_categoria"];
				?>
			<li><a href="<?php echo URL_BASE . "categoria/&c=$id_menu_cat"?>"><span><img src="<?php echo URL_BASE ?>imagens/<?php echo $menu_categoria["icone"]; ?>"></span><?php echo $menu_categoria["categoria"]; ?></a>
			   

				<ul>
				  <?php
					   
					   $menu_subcategorias = consultar("subcategoria"," ativo_subcategoria = 'S' and id_categoria = $id_menu_cat");
					   foreach ($menu_subcategorias as $menu_subcategoria){
						$url_sub = URL_BASE ."subcategorias/&s=".$menu_subcategoria["id_subcategoria"];
			     
				echo "<li><a href=$url_sub title=Sub Produto 1> $menu_subcategoria[subcategoria] </a>	</li>";
				 } ?>
				</ul>
					   
			</li>
					<?php } ?>
		</ul>
	</div>
</div>
</nav>
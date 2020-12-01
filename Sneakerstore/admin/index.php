<!doctype html>
<?php 
    session_start();
	require("../include/config.php");
	require("../include/crud.php");
	require("../include/biblio.php");

	$idadm = @$_SESSION["LJADM"]["id_adm"];

	if(!isset($_SESSION["LJADM"])){
    header('location:login.php');
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Adiministração</title>

<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/estilo.css" rel="stylesheet" type="text/css">


  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
 <script type="text/javascript" src="js/abas.js"></script>
 <script type="text/javascript" src="js/js.js"></script>
 <script  src = "<?php echo URL_ADMIN ?>ckeditor/ckeditor.js" ></script> 
</head>


<body>
<!-- topo -->
	<?php include "cabecalho.php" ?>
	

<!-- meio -->
<div class="conteudo">
		<!--------------menu esquerdo---------------------->	
	<div class="base-esq">	
	<h1>PAINEL DE CONTROLE</h1>	
		<div class="lado-esq">
				<ul>
					<li><a href="index.php?link=1">Home</a></li>
					<li><a href="index.php?link=2">Categorias</a> </li>				
					<li><a href="index.php?link=4">Subcategorias</a> </li>
					<li><a href="index.php?link=6">Produtos</a> </li>
					<li><a href="index.php?link=9">Fabricantes</a> </li>
					<li><a href="index.php?link=11">Administradores</a> </li>
					<li><a href="index.php?link=13">Banners</a> </li>
					<li><a href="index.php?link=15">Anúncio</a> </li>
					
				</ul>
			
		</div>
	</div>
	
	<!--------------fecha menu esquerdo---------------------->
		
<div class="base-direita">
		<?php 
			@$link = $_GET["link"];
			
			$pag[1] = "home.php";
			$pag[2] = "lst/lst_categoria.php" ;
			$pag[3] = "frm/frm_categoria.php" ;
			$pag[4] = "lst/lst_subcategoria.php" ;
			$pag[5] = "frm/frm_subcategoria.php" ;
			$pag[6] = "lst/lst_produto.php" ;
			$pag[7] = "frm/frm_produto.php" ;
			$pag[8] = "lst/lst_cliente.php" ;
			$pag[9] = "lst/lst_fabricante.php" ;
			$pag[10] = "frm/frm_fabricante.php" ;
			$pag[11] = "lst/lst_adm.php" ;
			$pag[12] = "frm/frm_adm.php";
			$pag[13] = "lst/lst_banner.php";
			$pag[14] = "frm/frm_banner.php";
			$pag[15] = "lst/lst_anuncio.php";
			$pag[16] = "frm/frm_anuncio.php";			
		
			if(!empty($link)){
				
				if(file_exists($pag[$link]))				
					include $pag[$link] ;
				else
					include "home.php";			
			
			}else
				include "home.php";
	?>
		
</div>
</div>

<!-- rodape -->

<?php include "rodape.php" ?>
</body>
</html>

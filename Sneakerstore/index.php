<!doctype html>
<?php 
	session_start();
	require("include/config.php");
	require("include/crud.php");
	require("include/biblio.php");

	$idpedido = @$_SESSION["ljpedido"];
	$idcliente = @$_SESSION["LJCLIENTE"]["id_cliente"];
	//unset($_SESSION["ljpedido"]);
?>
<html>
<head>
<meta charset="utf-8">
<title>Sneakerstore</title>
<link href="<?php echo URL_BASE?>css/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL_BASE?>css/estilo.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL_BASE?>css/estilo-m.css" rel="stylesheet" type="text/css">
<link rel="icon" type="imagem/jpg" href="<?php echo URL_BASE?>imagens/sapatos2.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript" src="<?php echo URL_BASE?>js/jquery-1.11.2.min.js"></script>
<!--menu mobile-->  
<script>
	$(function(){
		$('.mobmenu').click (function(){
		$('.navmenu .conteudo').slideToggle();
		$(this).toggleClass('active');
			return false;
		});
	});
</script>
<script type="text/javascript">
        
        	/* Função que carrega script das abas */        
        	$.abasSimples = function ()
        	{        	
        		/* Guarda IDs dos elementos */        	
        		var abas = 'p#abas';
        		var conteudos = 'ul#conteudos';        		
        		/* Oculta todas as abas */        		
        		$(conteudos + ' li').hide();        		
        		/* Exibe a primeira aba */        		
        		$(conteudos + ' li:first-child').show();        		
        		/* Quando uma aba for clicada */        		
        		$(abas + ' a').click(function()
        		{        		
        			/* Remove todas as classes de todas as abas */        		
        			$(abas + ' a').removeClass('selected');        			
        			/* Acrescenta uma classe CSS marcando visualmente a aba como selecionada */        			
        			$(this).addClass('selected');        			
        			/* Oculta todas as abas abertas */        			
        			$(conteudos + ' li').hide();        			
        			/* Exibe a aba que foi clicada */        			
        			$(conteudos +  ' ' + $(this).attr('href')).show();        			
        			/* Fim :D */        			
        			return false;        			
        		});         		
        	};
        	
        	/* Quando o documento estiver carregado… */
			$(document).ready(function()
			{			
				/* Carrega a função das abas */				
				$.abasSimples();			
});
			
</script>

</head>

<body>

<?php include "cabecalho.php"?>
			
		<?php
			 
					
					
					$url = (isset($_GET['url'])) ? $_GET['url'] :'';
						$explode = explode('/',$url);
				
					$paginas = array('home','carrinho','categoria','subcategorias','produto',
									 'compra-finalizada','nao-logado','cadastro',
									 'pagamento','transferencia','login','minha_conta',);
					
					if(isset($explode[0]) && $explode[0] == '') 
						{			
							include_once "home.php";
						}
						elseif($explode[0] != '') 
						{
							
							if(isset($explode[0]) && in_array($explode[0], $paginas)){	
								
								include_once $explode[0].".php";
									
							} else{
							
								include_once "home.php";
							}
					
						}				
								
			
			?>
		


<?php include"rodape.php"?>

</body>
</html>

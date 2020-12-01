<?php
   @$ordem = $_GET["ordem"]?$_GET["ordem"]:0;
   @$pesq = $_GET["pesq"]?$_GET["pesq"]:"";
   @$campo = $_GET["campo"]?$_GET["campo"]:"";

?>

	
	<div class="base-lista">
		<div class="cx-lista">
		<form action="index.php" method="get" name="buscausuario" id="buscausuario">
		  <table border="0">
			<tbody>
			  <tr>
				<th width="16%"><strong>Buscar:</strong></th>
				<th width="60%"><input type="text" name="pesq" value="<?php echo $pesq; ?>"/></th>
				<th>
				<select name="campo">
				   
				           
				  <option value="ativo_anuncio">Ativo (S ou N)</option>  
				   
				</select></th>
					<input type="hidden" name="link" value="15"  />
				<th><input type="submit" name="Submit" value="" class="but" /></th>
			  </tr>
			</tbody>
		  </table>
		</form>


		<h2>Anúncios</h2>
		<a href="index.php?link=16">Inserir Anúncio</a>
		<p class="limpar">&nbsp;</p>
		
		<?php
      if(@$pesq !=""){
        $sql1 = "SELECT id_anuncio FROM anuncio WHERE $campo LIKE '%$pesq%'";
        $sql2 = "SELECT * FROM anuncio WHERE $campo LIKE '%$pesq%'";

        $complemento = "&pesq = $pesq&campo=$campo";
      }else{
        $sql1 = "SELECT id_anuncio FROM anuncio";
        $sql2 = "SELECT * FROM anuncio";
        $complemento = "";
      }

        $total = total($sql1);
        echo "Total : $total <br>";

        if($total <= 0) {
            echo "Não existem dados cadastrados";
        }else{

        

    ?>
		<table width="100%" border="0" cellpadding="2" cellspacing="2">
		<tbody>
			<tr>
			  <td align="center" class="tdbc">id</td>
			  <td align="center" class="tdbc">Imagem</td>
			  <td align="left" class="tdbc">Ativo</td>
			   <td align="center" colspan="2" class="tdbc">Ação</td>
			</tr>
        <?php
                $lpp = 10; //linha por página
                $inicio = $ordem * $lpp;

            $anuncios = selecionar($sql2." LIMIT $inicio, $lpp");
            $i=1;
            foreach ($anuncios as $anuncio) {
                $i++;
                if($i%2==0){
                    $col="coluna1";
                }else{
                    $col="coluna2";
                }
        ?>
		  <tr class="<?php echo $col; ?>" align="center">
            
            <td><?php echo $anuncio["id_anuncio"] ?></td>
            <td><?php echo $anuncio["imagem"] ?></td>
            <td><?php echo $anuncio["ativo_anuncio"] ?></td>
            <td align="center"><a href="index.php?link=16&acao=Alterar&id=<?php echo $anuncio["id_anuncio"] ?>">Editar</a></td>
            <td align="center"><a href="index.php?link=16&acao=Excluir&id=<?php echo $anuncio["id_anuncio"] ?>" class="excluir">Excluir</a></td>
        </tr>
            <?php }} ?>
		  
		 
		  
				
            	
            </tbody>
            </table>
		
		<div class="cx-paginacao">
			<p><?php echo mostraPaginacao("index.php?link=15$complemento", $ordem, $lpp, $total) ?></p>
		</div>

		<p>&nbsp;</p>
		<p>&nbsp;</p>

	</div>
	</div>
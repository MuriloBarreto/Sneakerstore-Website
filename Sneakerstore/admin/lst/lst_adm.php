<?php
   @$ordem = $_GET["ordem"]?$_GET["ordem"]:0;
   @$pesq = $_GET["pesq"]?$_GET["pesq"]:"";
   @$campo = $_GET["campo"]?$_GET["campo"]:"";

?>

	<h1>Lista de Administradores</h1>
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
				   
				  <option value="nome">Nome</option>           
				  
				   
				</select></th>
					<input type="hidden" name="link" value="11"  />
				<th><input type="submit" name="Submit" value="" class="but" /></th>
			  </tr>
			</tbody>
		  </table>
		</form>


		<h2>Lista de Administradores</h2>
		<a href="index.php?link=12">Cadastrar Administrador </a>
		<p class="limpar">&nbsp;</p>
		
		<?php
      if(@$pesq !=""){
        $sql1 = "SELECT id_adm FROM adm WHERE $campo LIKE '%$pesq%'";
        $sql2 = "SELECT * FROM adm WHERE $campo LIKE '%$pesq%'";

        $complemento = "&pesq = $pesq&campo=$campo";
      }else{
        $sql1 = "SELECT id_adm FROM adm";
        $sql2 = "SELECT * FROM adm";
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
			  <td align="center" class="tdbc">Nome</td>
              <td align="center" class="tdbc">Email</td>
			  
			   <td align="center" colspan="2" class="tdbc">Ação</td>
			</tr>
        <?php
                $lpp = 10; //linha por página
                $inicio = $ordem * $lpp;

            $adms = selecionar($sql2." LIMIT $inicio, $lpp");
            $i=1;
            foreach ($adms as $adm) {
                $i++;
                if($i%2==0){
                    $col="coluna1";
                }else{
                    $col="coluna2";
                }
        ?>
		  <tr class="<?php echo $col; ?>" align="center">
            
            <td><?php echo $adm["id_adm"] ?></td>
            <td><?php echo $adm["nome"] ?></td>
            <td><?php echo $adm["email"] ?></td>
            <td align="center"><a href="index.php?link=12&acao=Alterar&id=<?php echo $adm["id_adm"] ?>">Editar</a></td>
            <td align="center"><a href="index.php?link=12&acao=Excluir&id=<?php echo $adm["id_adm"] ?>" class="excluir">Excluir</a></td>
        </tr>
            <?php }} ?>
		  
		 
		  
				
            	
            </tbody>
            </table>
		
		<div class="cx-paginacao">
			<p><?php echo mostraPaginacao("index.php?link=11$complemento", $ordem, $lpp, $total) ?></p>
		</div>

		<p>&nbsp;</p>
		<p>&nbsp;</p>

	</div>
	</div>
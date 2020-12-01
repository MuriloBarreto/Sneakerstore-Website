<?php
   @$ordem = $_GET["ordem"]?$_GET["ordem"]:0;
   @$pesq = $_GET["pesq"]?$_GET["pesq"]:"";
   @$campo = $_GET["campo"]?$_GET["campo"]:"";

?>

<!-- <h2>Lista de cliente</h2> -->
<div class="base-lista">
		<div class="cx-lista">
        <h2>Lista de clientes</h2>
        
	
		<p class="limpar">&nbsp;</p>
		
		<?php
      if(@$pesq !=""){
        $sql1 = "SELECT id_cliente FROM cliente WHERE $campo LIKE '%$pesq%'";
        $sql2 = "SELECT * FROM cliente WHERE $campo LIKE '%$pesq%'";

        $complemento = "&pesq = $pesq&campo=$campo";
      }else{
        $sql1 = "SELECT id_cliente FROM cliente";
        $sql2 = "SELECT * FROM cliente";
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
              <td align="center" class="tdbc">Cidade</td>
              <td align="center" class="tdbc">Data de cadastro</td>
			  <td align="left" class="tdbc">Ativo</td>
			   
			</tr>
        <?php
                $lpp = 10; //linha por página
                $inicio = $ordem * $lpp;

            $clientes = selecionar($sql2." LIMIT $inicio, $lpp");
            $i=1;
            foreach ($clientes as $cliente) {
                $i++;
                if($i%2==0){
                    $col="coluna1";
                }else{
                    $col="coluna2";
                }
        ?>
		  <tr class="<?php echo $col; ?>" align="center">
            
            <td><?php echo $cliente["id_cliente"] ?></td>
            <td><?php echo $cliente["cliente"] ?></td>
            <td><?php echo $cliente["cidade"] ?></td>
            <td><?php echo $cliente["data_cadastro"] ?></td>
            <td><?php echo $cliente["ativo_cliente"] ?></td>
            
        </tr>
            <?php }} ?>
		  
		 
		  
				
            	
            </tbody>
            </table>
		
		<div class="cx-paginacao">
			<p><?php echo mostraPaginacao("index.php?link=8$complemento", $ordem, $lpp, $total) ?></p>
		</div>

		<p>&nbsp;</p>
		<p>&nbsp;</p>

	</div>
	</div>
<?php
   @$id = (int) $_GET["id"];
   @$acao = $_GET["acao"];

   if($id){
       $categoria = consultar("categoria", " id_categoria = $id");
       
       $txt_categoria = $categoria[0] ["categoria"];
       $txt_ativo = $categoria[0] ["ativo_categoria"];
   }


?>

<h1>CADASTRO DE CATEGORIAS</h1>
		<div class="cx-form">
		<div class="cx-pd">			

<form action="op/op_categoria.php" method="post">
		 
	
  <label>
	<strong>Título da Categoria</strong>
    <input type="text" name="txt_categoria" id="txt_categoria" value="<?php echo @$txt_categoria; ?>" size="110">
  </label>
  
<label>
	<strong>Ativo</strong>
	<select name="txt_ativo" class="tm3">
		<option value="S" <?php if(@$txt_ativo=="S") echo "selected"; ?>>sim</option>
                <option value="N" <?php if(@$txt_ativo=="N") echo "selected"; ?>>não</option>
  </select>
 
</label>

	
		<label>
		<div class="cx-but">
			<input type="hidden" name ="MAX_FILE_SIZE" value="<?php echo @$id; ?>">
			<input type="hidden" name ="id" value="<?php echo @$id; ?>">							
			<input type="hidden" name ="acao" value="<?php echo ($acao!='')?$acao: 'Cadastrar'; ?> ">										
			<input type="submit" name= "logar" id="logar" value = "<?php echo ($acao!='')?$acao: 'Cadastrar' ?>" class="but" >	
		</div>
		</label>
</form>

		</div>
		</div>		
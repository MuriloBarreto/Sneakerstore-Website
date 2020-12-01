<?php
   @$id = (int) $_GET["id"];
   @$acao = $_GET["acao"];

   if($id){
       $anuncio = consultar("anuncio", " id_anuncio = $id");
       
       
       $txt_imagem = $anuncio[0] ["imagem"];
       $txt_url = $anuncio[0] ["url"];
       $txt_ativo = $anuncio[0] ["ativo_anuncio"];
   }


?>

<h1>INSERIR ANÚNCIO</h1>
		<div class="cx-form">
		<div class="cx-pd">			

<form action="op/op_anuncio.php" method="post" enctype="multipart/form-data">
		 
	
  <label>
	<strong>Buscar imagem</strong>
    <input type="file" name="arquivo" id="arquivo" value="<?php echo @$txt_imagem; ?>" size="109"/>
  </label>
  <label>
	<strong>Imagem</strong>
    <input type="text" name="txt_imagem" id="txt_imagem" value="<?php echo @$txt_imagem; ?>" size="109"/>
  </label>
  <label>
	<strong>Url</strong>
    <input type="text" name="txt_url" id="txt_url" value="<?php echo @$txt_url; ?>" size="110">
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
			<input type="hidden" name ="id" value="<?php echo @$id; ?>">							
			<input type="hidden" name ="acao" value="<?php echo ($acao!='')?$acao: 'Cadastrar'; ?> ">										
			<input type="submit" name= "logar" id="logar" value = "<?php echo ($acao!='')?$acao: 'Cadastrar' ?>" class="but" >	
		</div>
		</label>
</form>

		</div>
		</div>
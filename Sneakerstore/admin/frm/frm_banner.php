<?php
   @$id = (int) $_GET["id"];
   @$acao = $_GET["acao"];

   if($id){
       $banner = consultar("banner", " id_banner = $id");
       
       $txt_titulo = $banner[0] ["titulo"];
       $txt_imagem = $banner[0] ["imagem"];
       $txt_url = $banner[0] ["url"];
       $txt_ativo = $banner[0] ["ativo"];
   }


?>

<h1>INSERIR BANNER</h1>
		<div class="cx-form">
		<div class="cx-pd">			

<form action="op/op_banner.php" method="post" enctype="multipart/form-data">
		 
	
  <label>
	<strong>Título</strong>
    <input type="text" name="txt_titulo" id="txt_titulo" value="<?php echo @$txt_titulo; ?>" size="110">
  </label>
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
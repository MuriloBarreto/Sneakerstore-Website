<?php
   @$id = (int) $_GET["id"];
   @$acao = $_GET["acao"];

   if($id){
       $subcategoria = consultar("subcategoria", " id_subcategoria = $id");
       
       $id_categoria = $subcategoria[0] ["id_categoria"];
       $txt_subcategoria = $subcategoria[0] ["subcategoria"];
       $txt_ativo = $subcategoria[0] ["ativo_subcategoria"];
   }


?>	


<h1>CADASTRO DE Subcategoria</h1>
<div class="cx-form">
	<div class="cx-pd">
	<form action="op/op_subcategoria.php" method="post">
<label class="esq">		
<strong>Categoria</strong>
    <select name="txt_id_categoria">
	<?php
                $categorias = consultar("categoria");
                foreach ($categorias as $categoria){
                 $cod_categoria =  $categoria["id_categoria"];
                 
                 if ($cod_categoria == @$id_categoria)
                     $selecionado = "selected";
                 else
                 $selecionado = "";
                echo "<option value=$cod_categoria $selecionado>$categoria[categoria]</option>";
                }
            ?>       
      </select>
</label>
   
<label class="dir">
<strong class="tm-02">Ativo</strong>
	<select name="txt_ativo">
	<option value="S" <?php if(@$txt_ativo=="S") echo "selected"; ?>>sim</option>
                <option value="N" <?php if(@$txt_ativo=="N") echo "selected"; ?>>não</option>
  </select>
</label>
  
	
  <label><strong class="tm-02">Título do subcategoria</strong>
    <input type="text" name="txt_subcategoria" id="txt_subcategoria" value="<?php echo @$txt_subcategoria; ?>" size="110">
  

  </label>


	
		<label>
		<div class="cx-but">
			<input type="hidden" name ="id" value="<?php echo @$id; ?>">							
			<input type="hidden" name ="acao" value="<?php echo ($acao!='')?$acao: 'Cadastrar'; ?>">										
			<input type="submit" name= "logar" id="logar" value = "<?php echo ($acao!='')?$acao: 'Cadastrar' ?>" class="but" >	
		</div>	
		</label>
</form>

		</div>
		</div>
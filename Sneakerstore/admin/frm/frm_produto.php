<?php
   @$id = (int) $_GET["id"];
   @$acao = $_GET["acao"];

   if($id){
       $produto = consultar("produto", " id_produto = $id");
       
       $id_categoria = $produto[0] ["id_categoria"];
       $id_subcategoria = $produto[0] ["id_subcategoria"];
       $id_fabricante = $produto[0] ["id_fabricante"];
       $txt_produto = $produto[0] ["produto"];
       $txt_preco_alto = $produto[0] ["preco_alto"];
       $txt_preco = $produto[0] ["preco"];
       $txt_descricao = $produto[0] ["descricao"];
       $txt_detalhes = $produto[0] ["detalhes"];
       $txt_imagem = $produto[0] ["imagem"];
       $txt_destaque = $produto[0] ["destaque"];
       $txt_ativo = $produto[0] ["ativo_produto"];
   }


?>
    

<h1>CADASTRO DE produtos</h1>
		<div class="cx-form">
		<div class="cx-pd">		

<form action="op/op_produto.php" method="post" enctype="multipart/form-data">
		
<label class="esq">
	<strong>Categoria</strong>
    <select name="txt_id_categoria" id="categorias">
	<option>Selecione uma categoria</option>
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
	<strong>Subategoria</strong>
    <select name="txt_id_subcategoria" id="subcategorias">
	<option>Selecione uma subcategoria</option>
            <?php
                $subcategorias = consultar("subcategoria");
                foreach ($subcategorias as $subcategoria){
                 $cod_subcategoria =  $subcategoria["id_subcategoria"];
                 
                 if ($cod_subcategoria == @$id_subcategoria)
                     $selecionado = "selected";
                 else
                 $selecionado = "";
                echo "<option value=$cod_subcategoria $selecionado>$subcategoria[subcategoria]</option>";
                }
            ?>         
      </select>
  </label>
 
<label class="esq">
	<strong>Fabricante</strong>
    <select name="txt_id_fabricante">
	<option>Selecione um Fabricante</option>
            <?php
                $fabricantes = consultar("fabricante");
                foreach ($fabricantes as $fabricante){
                 $cod_fabricante =  $fabricante["id_fabricante"];
                 
                 if ($cod_fabricante == @$id_fabricante)
                     $selecionado = "selected";
                 else
                 $selecionado = "";
                echo "<option value=$cod_fabricante $selecionado>$fabricante[fabricante]</option>";
                }
            ?>         
      </select>
  </label>
   <label class="dir">
	<strong>Ativo</strong>
	<select name="txt_ativo" class="tm3">
                <option value="S" <?php if(@$txt_ativo=="S") echo "selected"; ?>>sim</option>
                <option value="N" <?php if(@$txt_ativo=="N") echo "selected"; ?>>não</option>
	</select>
</label> 

	
  <label>
	<strong>Título do produto</strong>
    <input type="text" name="txt_produto" id="txt_titulo_produto" value="<?php echo @$txt_produto; ?>" size="109"/>
  </label>
  
   <label>
	<strong>Buscar imagem</strong>
    <input type="file" name="arquivo" id="arquivo" value="<?php echo @$txt_imagem; ?>" size="109"/>
  </label>
  
   <label>
	<strong>Imagem</strong>
    <input type="text" name="txt_imagem" id="txt_imagem_produto" value="<?php echo @$txt_imagem; ?>" size="109"/>
  </label>
  <label class="esq">
	<strong>Preço anterior</strong>
    <input type="text" name="txt_preco_alto" id="txt_preco_alto" value="<?php echo @$txt_preco_alto; ?>" size="109" />
  </label>
   <label class="dir">
	<strong>Valor atual</strong>
    <input type="text" name="txt_preco" id="txt_valor_produto" value="<?php echo @$txt_preco; ?>" size="109" />
  </label>  

	
<label>
        <strong>Descrição</strong>
        <textarea  name="txt_descricao" id="txt_descricao_produto"  class="ckeditor" rows="15" cols="70"> <?php echo @$txt_descricao; ?>  </textarea>
</label>

<label>
        <strong>Detalhes</strong>
        <textarea  name="txt_detalhes" id="txt_detalhes_produto"  class="ckeditor" rows="15" cols="70"> <?php echo @$txt_detalhes; ?>  </textarea>
</label>

<label class="esq">
	<strong>Destaque</strong>
	<select name="txt_destaque" class="tm3">
                <option value="S" <?php if(@$txt_destaque=="S") echo "selected"; ?>>sim</option>
                <option value="N" <?php if(@$txt_destaque=="N") echo "selected"; ?>>não</option>
	</select>
</label> 

	
		<label>
		<div  class="cx-but">
			<input type="hidden" name ="MAX_FILE_SIZE" value="<?php echo @$id; ?>">
            <input type="hidden" name ="id" value="<?php echo @$id; ?>">							
			<input type="hidden" name ="acao" value="<?php echo ($acao!='')?$acao: 'Cadastrar'; ?>">										
			<input type="submit" name= "logar" id="logar" value = "<?php echo ($acao!='')?$acao: 'Cadastrar' ?>" class="but" >		
		</div>				
		</label>
</form>

		</div>
		</div>
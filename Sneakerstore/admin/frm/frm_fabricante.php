<?php
   @$id = (int) $_GET["id"];
   @$acao = $_GET["acao"];

   if($id){
       $fabricante = consultar("fabricante", " id_fabricante = $id");
       
       $txt_fabricante = $fabricante[0] ["fabricante"];
       
   }


?>

<h1>CADASTRO DE FABRICANTES</h1>
		<div class="cx-form">
		<div class="cx-pd">			

<form action="op/op_fabricante.php" method="post">
		 
	
  <label>
	<strong>Nome do fabricante</strong>
    <input type="text" name="txt_fabricante" id="txt_fabricante" value="<?php echo @$txt_fabricante; ?>" size="110">
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
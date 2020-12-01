<?php
   @$id = (int) $_GET["id"];
   @$acao = $_GET["acao"];

   if($id){
       $adm = consultar("adm", " id_adm = $id");
       
       $txt_nome = $adm[0] ["nome"];
       $txt_email = $adm[0] ["email"];
       $txt_senha = $adm[0] ["senha"];
       
   }


?>

<h1>CADASTRO DE ADMINISTRADOR</h1>
		<div class="cx-form">
		<div class="cx-pd">			

<form action="op/op_adm.php" method="post">
		 
	
  <label>
	<strong>Nome</strong>
    <input type="text" name="txt_nome" id="txt_nome" value="<?php echo @$txt_nome; ?>" size="110" required="true">
  </label>
  <label>
	<strong>Email</strong>
    <input type="email" name="txt_email" id="txt_email" value="<?php echo @$txt_email; ?>" size="110" required="true">
  </label>
  <label>
	<strong>Senha</strong>
    <input type="password" name="txt_senha" id="txt_senha" value="<?php echo @$txt_senha; ?>" size="110" required="true">
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
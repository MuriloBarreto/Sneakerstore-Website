
<div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php include"menu-lateral.php"?>
	
	<div class="lado-dir">
	<div class="prog2"></div>
	<p>&nbsp;</p>
	<div class="base-cadastro finaliza">	
		<form action="op_login.php" method="post">
			<h1><span>Acesse sua conta</span><br/><p>Se você já possui uma conta, informe seus dados.</p></h1>
			<label>
				<strong>Email:</strong>
				<input type="text" name="tx_email" required="true">
			</label>
			
			<label>
				<strong>Senha:</strong>
				<input type="password" name="tx_senha" required="true">
			</label>
			
									
			<label>
				<input type="hidden" name="venda" value="S">
				<input type="submit" class="cadastrar logar" value="Entrar" style=" background: black; color:white; border-color: black;">
			</label>
		</form>
	</div>
		<div class="limpar"></div>
			<div class="separa" ><span>OU</span></div>
		<div class="limpar"></div>
	<div class="base-cadastro finaliza">
		<h1><span>Cadastre-se aqui</span><br/><p>Se ainda não é cadastrado, cadastre-se aqui.</p></h1>
		<form action="op_cliente.php" method="post">
			<label>
				<strong>Nome:</strong>
				<input type="text" name="txt_cliente" required="true">
			</label>
			<label class="fl">
				<strong>Email:</strong>
				<input type="text" name="txt_email" required="true">
			</label>
			<label class="fl">
				<strong>Senha:</strong>
				<input type="text" name="txt_senha" required="true">
			</label>
			<label class="fl">
				<strong>Endereço:</strong>
				<input type="text" name="txt_endereco" required="true">
			</label>
			<label class="fl">
				<strong>Bairro:</strong>
				<input type="text" name="txt_bairro" required="true">
			</label>
			
			<label class="fl">
				<strong>CEP:</strong>
				<input type="text" name="txt_cep" required="true">
			</label>
			<label class="fl">
				<strong>UF:</strong>
				<input type="text" name="txt_uf" required="true">
			</label>
			
			<label class="fl">
				<strong>Cidade:</strong>
				<input type="text" name="txt_cidade" required="true">
			</label>
			<label class="fl">
				<strong>Telefone:</strong>
				<input type="text" name="txt_fone" required="true">
			</label>
			<label>
			<input type="submit" class="cadastrar" value="Cadastrar" style=" background: black; color:white; border-color: black;">
			</label>
			</form>
	</div>
						
		
	
	</div>
</div>
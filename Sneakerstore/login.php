<div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php include"menu-lateral.php"?>
	
	<div class="lado-dir">
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
			
			<!-- <label><a href="index.php?link=10" class="relembrar">Esqueceu sua senha?</a></label>						 -->
			<label>
				<input type="hidden" name="venda" value="S">
				<input type="submit" class="cadastrar logar" value="Entrar" style=" background: black; color:white; border-color: black;">
			</label>
		</form>
	</div>
    </div>
</div>
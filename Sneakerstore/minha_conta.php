<div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php include"menu-lateral.php"?>
	
	
	
<div class="lado-dir">
<title class="migalha" style=" background: black; color:white; border-color: black;">Pedidos</title>
<?php
		$id = @$_SESSION["LJCLIENTE"]["id_cliente"];
        $lst_pedidos = consultar("venda,itens","id_cliente = $id and venda.id_venda = itens.id_venda");
        if(@$lst_pedidos){
		foreach ($lst_pedidos as $lst_pedido) {
            
	 ?>
	<div class="caixa-carrinho clientes" >			
<table width="50%" border="0" cellspacing="0" cellpadding="0">
	<thead>
	  <tr>
		<th align="center">Numero do Pedido</th>
		<th align="center">Data da Compra</th>
		<th align="center">Total da Compra</th>
		<th align="center">Pago</th>
		
		
	  </tr>
	  </thead>
	  
	  <tbody>
	  
	  <tr>
	  
		<td style=" text-align: center;"><?php echo $lst_pedido["id_venda"] ?></td>
		<td style=" text-align: center;"><?php echo $lst_pedido["data_venda"] ?></td>
		<td style=" text-align: center;"><?php echo $lst_pedido["subtotal"] ?></td>
		<td style=" text-align: center;"><?php echo $lst_pedido["pago"] ?></td>
		
		
	  </tr>
		
	  </tbody>
	  
</table>
</div>
<?php } }else{
    echo "Você não possui pedidos";
}?>
</div>



	<div class="lado-dir">
	<title class="migalha" style=" background: black; color:white; border-color: black;">Cadastro</title>
	<div class="base-cadastro">
		
		<form action="op_cliente.php" method="post">
		<h1><span>Dados para acesso</span></h1>	
			<label>
				<strong>Nome:</strong>
				<input type="text" name="txt_cliente" value="<?php echo @$_SESSION["LJCLIENTE"]["cliente"] ?>">
			</label>
			<label class="fl">
				<strong>Senha:</strong>
				<input type="text" name="txt_senha" value="">
			</label>
			<label class="fl">
				<strong>Email:</strong>
				<input type="text" name="txt_email" value="<?php echo @$_SESSION["LJCLIENTE"]["email"] ?>">
			</label>
			
			
			
			<div class="limpar">
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			</div>
			
			
			<h1><span>Dados pessoais</span></h1>
			<label>
				<strong>Endereço:</strong>
				<input type="text" name="txt_endereco" required="true" value="<?php echo @$_SESSION["LJCLIENTE"]["endereco"] ?>">
			</label>
			<label>
				<strong>Bairro:</strong>
				<input type="text" name="txt_bairro" required="true" value="<?php echo @$_SESSION["LJCLIENTE"]["bairro"] ?>">
			</label>
			
			<label class="fl">
				<strong>CEP:</strong>
				<input type="text" name="txt_cep" required="true" value="<?php echo @$_SESSION["LJCLIENTE"]["cep"] ?>">
			</label>
			<label class="fl">
				<strong>Cidade:</strong>
				<input type="text" name="txt_cidade" required="true" value="<?php echo @$_SESSION["LJCLIENTE"]["cidade"] ?>">
			</label>
			
			<label class="fl">
				<strong>Telefone:</strong>
				<input type="text" name="txt_fone" required="true" value="<?php echo @$_SESSION["LJCLIENTE"]["fone"] ?>">
			</label>
			<label class="fl">
				<strong>UF:</strong>
				<input type="text" name="txt_uf" required="true" value="<?php echo @$_SESSION["LJCLIENTE"]["uf"] ?>">
			</label>
			
			<label>
				<!--<input type="text" name="txt_uf" value="">-->
				<input type="submit" class="cadastrar" style=" background: black; color:white; border-color: black;">
			</label>
		</form>
	</div>
	</div>
</div>
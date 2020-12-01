<?php
 require("../include/config.php");
 require("../include/crud.php");
 require("../include/biblio.php");

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo1.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
	<title>Login</title>
	<meta charset="utf-8">
</head>
<body style=" margin: 0;
    padding: 0;
    background-image: url(imagens/paisagem.jpg);
    background-size: cover;
    ">

<div class="login">
<h1> Login </h1>

<hr>
<form action="op/op_login.php" method="POST">
<p>Email</p> 
<input type="text" name="txt_email" placeholder="Digite seu email">
<p>Senha</p> 
<input type="password" name="txt_senha" placeholder="Digite sua senha"><br>


<button type="submit" name="btn-entrar"> Entrar </button>
<p style="font-weight: bold;
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    color: white;
    transition: 0.2s;
    align-items: center;
"><a class="aa" href="<?php echo URL_BASE ?>"> Voltar para o site </a></p>
</form>
</div>

</body>
</html>
<?php
    session_start();
    require("include/config.php");
    require("include/crud.php");
    require("include/biblio.php");
    $url_sucesso  = URL_BASE ."home";
    $url_erro  = URL_BASE ."nao-logado";

    $email = strip_tags(filter_input(INPUT_POST, "tx_email"));
    $senha = strip_tags(filter_input(INPUT_POST, "tx_senha"));

    $data = date("y-m-d");

    

    if(($senha) && ($email)){
        $cliente = consultar("cliente", " email = '$email' and senha = '$senha'");
         
        if($cliente){
        
         
           foreach($cliente as $c)
            $_SESSION["LJCLIENTE"] = $c;
         echo "<script language='javascript'>window.location.href='$url_sucesso'</script>";
        }else{
            print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_erro'>
                      <script type = 'text/javascript'> alert ('Email ou Senha incorreto')</script>";
        }
    }











?>
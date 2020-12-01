<?php
    session_start();
    require("../../include/config.php");
    require("../../include/crud.php");
    require("../../include/biblio.php");
    $url_sucesso  = URL_ADMIN;
    $url_erro  = URL_ADMIN ."login.php";

    $email = strip_tags(filter_input(INPUT_POST, "txt_email"));
    $senha = strip_tags(filter_input(INPUT_POST, "txt_senha"));

    //$data = date("y-m-d");

    

    if(($senha) && ($email)){
        $adm = consultar("adm", " email = '$email' and senha = '$senha'");
         
        if($adm){
        
         
           foreach($adm as $a)
           $_SESSION["LJADM"] = $a;
         echo "<script language='javascript'>window.location.href='$url_sucesso'</script>";
        }else{
            print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_erro'>
                      <script type = 'text/javascript'> alert ('Email ou Senha incorreto')</script>";
        }
    }
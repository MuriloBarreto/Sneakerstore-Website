<?php
    session_start();
    require("include/config.php");
    require("include/crud.php");
    require("include/biblio.php");
    if (@$_GET["venda"]=="s"){
    $url_sucesso  = URL_BASE ."pagamento";
    }else{
        $url_sucesso  = URL_BASE ."cadastro";
    }
    $url_erro  = URL_BASE ."nao-logado";
    
    $nome = strip_tags(filter_input(INPUT_POST, "txt_cliente"));
    $email = strip_tags(filter_input(INPUT_POST, "txt_email"));

    $data = date("y-m-d");

    $dados = array (
        "cliente" => trim($_POST["txt_cliente"]),
        "endereco" => trim($_POST["txt_endereco"]),
        "bairro" => trim($_POST["txt_bairro"]),
        "cep" => trim($_POST["txt_cep"]),
        "cidade" => trim($_POST["txt_cidade"]),
        "fone" => trim($_POST["txt_fone"]),
        "uf" => trim($_POST["txt_uf"]),
        "email" => trim($_POST["txt_email"]),
        "senha" => trim($_POST["txt_senha"]),
        "ativo_cliente" => "S",
        "data_cadastro" => $data
    );

    if(($nome) && ($email)){
        $cliente = consultar("cliente", " email = '$email'");

        if(!$cliente){
            $ok = inserir("cliente", $dados);
        }else{
            $ok = alterar("cliente", $dados, "email = '$email' ");
        }
        $cliente = consultar("cliente", " email = '$email'");
        foreach($cliente as $c)
            $_SESSION["LJCLIENTE"] = $c;
    }
    
    if($ok){
        print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_sucesso'>
                  <script type = 'text/javascript'> alert ('Operação realizada com sucesso')</script>";
    }else{
        print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_erro'>
                  <script type = 'text/javascript'> alert ('Não foi possivel realizar a operção')</script>";
    }











?>
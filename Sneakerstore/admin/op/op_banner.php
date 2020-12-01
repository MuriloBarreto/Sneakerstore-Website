<?php
     
     ini_set('default_charset', 'UTF-8');
     require_once '../../include/config.php';
     require_once '../../include/crud.php';

        @$id =  $_POST["id"];
        @$acao = trim(addslashes($_POST["acao"])); 
        $b = "Cadastrar";
        $c = "Alterar";
        $d = "Excluir";
        
        $nome_arquivo = $_FILES["arquivo"]["name"];
        $tam_arquivo = $_FILES["arquivo"]["size"];
        $nome_temp = $_FILES["arquivo"]["tmp_name"];
        $txt_imagem = trim($_POST["txt_imagem"]);
  
        $extensoes = array(".gif",".png",".jpg",".img");
        $extensao = strrchr ($nome_arquivo, ".");
        $caminho_absoluto = "../../banner";
        //$nome_arquivo = time() . $extensao;
      //trabalhar com a imagem
      if (!empty($nome_arquivo)){
          if (!in_array($extensao, $extensoes)){
             die("Este arquivo não é permitido");
          }else{
             
             if(move_uploaded_file($nome_temp, $caminho_absoluto."/".$nome_arquivo))
             $txt_imagem = $nome_arquivo;
                  else
                     die ("erro no upload do arquivo");
          }
      
   }
     //echo "$id - $acao";
        

         $dados=array(
         "titulo" => trim($_POST["txt_titulo"]),
         "imagem" => trim($txt_imagem),
         "url" => trim($_POST["txt_url"]),
         "ativo" => trim($_POST["txt_ativo"])
          
        ); 
        
      $op = false;
      $url_sucesso = URL_ADMIN ."index.php?link=13";
      $url_erro = URL_ADMIN ."index.php?link=14";

        if ($acao == $b){
         $op = inserir("banner", $dados);
      }
         elseif($acao == $c){
            $op = alterar("banner",$dados, "id_banner = $id");
         }
         elseif ($acao == $d){
             
            $op = deletar("banner", "id_banner = $id");
         }
        
            
     if ($op)
        print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_sucesso'>
                  <script type = 'text/javascript'> alert ('Operação realizada com sucesso')</script>";
     else
     print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_erro'>
     <script type = 'text/javascript'> alert ('Operação não foi realizada')</script>";
     
?>
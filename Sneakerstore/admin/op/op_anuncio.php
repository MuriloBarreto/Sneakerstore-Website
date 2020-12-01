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
        $caminho_absoluto = "../../imagens";
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
         "imagem" => trim($txt_imagem),
         "url" => trim($_POST["txt_url"]),
         "ativo_anuncio" => trim($_POST["txt_ativo"])
          
        ); 
        
      $op = false;
      $url_sucesso = URL_ADMIN ."index.php?link=15";
      $url_erro = URL_ADMIN ."index.php?link=16";

        if ($acao == $b){
         $op = inserir("anuncio", $dados);
      }
         elseif($acao == $c){
            $op = alterar("anuncio",$dados, "id_anuncio = $id");
         }
         elseif ($acao == $d){
             
            $op = deletar("anuncio", "id_anuncio = $id");
         }
        
            
     if ($op)
        print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_sucesso'>
                  <script type = 'text/javascript'> alert ('Operação realizada com sucesso')</script>";
     else
     print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_erro'>
     <script type = 'text/javascript'> alert ('Operação não foi realizada')</script>";
     
?>
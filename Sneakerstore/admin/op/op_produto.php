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
        $txt_imagem = $_POST["txt_imagem"];
  
        $extensoes = array(".gif",".png",".jpg",".img");
        $extensao = strrchr ($nome_arquivo, ".");
        $caminho_absoluto = "../../produtos";
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
         "id_categoria" => trim($_POST["txt_id_categoria"]),
         "id_subcategoria" => trim($_POST["txt_id_subcategoria"]),
         "id_fabricante" => trim($_POST["txt_id_fabricante"]),
         "ativo_produto" => trim($_POST["txt_ativo"]),
         "produto" => trim($_POST["txt_produto"]),
         "imagem" => trim($txt_imagem),
         "preco_alto" => trim($_POST["txt_preco_alto"]),
         "preco" => trim($_POST["txt_preco"]),
         "descricao" => trim($_POST["txt_descricao"]),
         "detalhes" => trim($_POST["txt_detalhes"]),
         "destaque" => trim($_POST["txt_destaque"])
          
        ); 
        
      $op = false;
      $url_sucesso = URL_ADMIN ."index.php?link=6";
      $url_erro = URL_ADMIN ."index.php?link=7";

        if ($acao == $b){
         $op = inserir("produto", $dados);
      }
         elseif($acao == $c){
            $op = alterar("produto",$dados, "id_produto = $id");
         }
         elseif ($acao == $d){
             
            $op = deletar("produto", "id_produto = $id");
         }
        
            
     if ($op)
        print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_sucesso'>
                  <script type = 'text/javascript'> alert ('Operação realizada com sucesso')</script>";
     else
     print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_erro'>
     <script type = 'text/javascript'> alert ('Operação não foi realizada')</script>";
     
?>
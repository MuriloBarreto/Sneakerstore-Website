<?php
     
     ini_set('default_charset', 'UTF-8');
     require_once '../../include/config.php';
     require_once '../../include/crud.php';

        @$id =  $_POST["id"];
        @$acao = trim(addslashes($_POST["acao"])); 
        $b = "Cadastrar";
        $c = "Alterar";
        $d = "Excluir";
        
 
     

     $txt_nome = $_POST["txt_nome"];
     $txt_email = $_POST["txt_email"];
     $txt_senha = $_POST["txt_senha"];
     


     //echo "$id - $acao";
        

         $dados=array(
         "nome" => $txt_nome,
         "email" => $txt_email,
         "senha" => $txt_senha
        ); 
        
      $op = false;
      $url_sucesso = URL_ADMIN ."index.php?link=11";
      $url_erro = URL_ADMIN ."index.php?link=12";

        if ($acao == $b){
         $op = inserir("adm", $dados);
      }
         elseif($acao == $c){
            $op = alterar("adm",$dados, "id_adm = $id");
         }
         elseif ($acao == $d){
             
            $op = deletar("adm", "id_adm = $id");
         }
        
            
     if ($op)
        print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_sucesso'>
                  <script type = 'text/javascript'> alert ('Operação realizada com sucesso')</script>";
     else
     print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_erro'>
     <script type = 'text/javascript'> alert ('Operação não foi realizada')</script>";
       
?>
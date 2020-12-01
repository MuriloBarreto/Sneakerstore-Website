<?php
     
     ini_set('default_charset', 'UTF-8');
     require_once '../../include/config.php';
     require_once '../../include/crud.php';

        @$id =  $_POST["id"];
        @$acao = trim(addslashes($_POST["acao"])); 
        $b = "Cadastrar";
        $c = "Alterar";
        $d = "Excluir";
        
 
     

     $txt_fabricante = $_POST["txt_fabricante"];
     


     //echo "$id - $acao";
        

         $dados=array(
         "fabricante" => $txt_fabricante,
        ); 
        
      $op = false;
      $url_sucesso = URL_ADMIN ."index.php?link=9";
      $url_erro = URL_ADMIN ."index.php?link=10";

        if ($acao == $b){
         $op = inserir("fabricante", $dados);
      }
         elseif($acao == $c){
            $op = alterar("fabricante",$dados, "id_fabricante = $id");
         }
         elseif ($acao == $d){
             
            $op = deletar("fabricante", "id_fabricante = $id");
         }
        
            
     if ($op)
        print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_sucesso'>
                  <script type = 'text/javascript'> alert ('Operação realizada com sucesso')</script>";
     else
     print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_erro'>
     <script type = 'text/javascript'> alert ('Operação não foi realizada')</script>";
       
?>
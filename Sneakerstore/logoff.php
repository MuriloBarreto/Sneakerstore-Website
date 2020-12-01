<?php
    session_start();
    require("include/config.php");
    require("include/crud.php");
    require("include/biblio.php");
    $url_sucesso  = URL_BASE ;

    

   
     unset($_SESSION["LJCLIENTE"]);
    
    
    
        print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_sucesso'>
                  <script type = 'text/javascript'> alert ('Logoff Efetuado')</script>";
    
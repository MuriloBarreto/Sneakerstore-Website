<?php

require_once("../../include/config.php");
require_once("../../include/crud.php");

$id = $_GET["id"];

$subcategorias = consultar("subcategoria","id_categoria = $id");

$retorno = array();
foreach ($subcategorias as $subcategoria)
    $dados[] = $subcategoria;

echo json_encode($dados);


?>
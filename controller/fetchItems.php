<?php

include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;

require config::$administradorDAO_url;
require config::$itemDAO_url;
require config::$categoriaDAO_url;
require config::$administrador_url;
require config::$item_url;
require config::$categoria_url;

/** Permite traer información referente a los items
 *  Importante: este se inicializa a través de un script de jquery y las librerias de ajax
 */

if(isset($_POST["id"])){

$item = new item();
$categoria = new categoria();
$administrador = new administrador();
$itemDAO = new itemDAO();

$item = $itemDAO->buscarItem($_POST["id"]);

    $json = array(
        'idAdmin' => $item->getAdministrador()->getId(),
        'id' => $item->getId(),
        'nombre' => $item->getNombre(),
        'serie' => $item->getNroSerie(),
        'precio' => $item->getPrecio(),
        'fabricante' => $item->getFabricante(),
        'url' => $item->getPhourl(),
        'idCategoria' => $item->getCategoria()->getId(),      

    );
echo json_encode($json); 
}


 //fetch.php  

?>
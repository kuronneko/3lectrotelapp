<?php
//insert.php
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;

require config::$administradorDAO_url;
require config::$itemDAO_url;
require config::$categoriaDAO_url;
require config::$administrador_url;
require config::$item_url;
require config::$categoria_url;

/** Controlador ajax para el registro, modificación y eliminación de items
 *  El controlador se inicializa a través de un script de jquery utilizando las librerias de ajax
 */
$item = new item();
$categoria = new categoria();
$administrador = new administrador();
$itemDAO = new itemDAO();


            if(!empty($_POST["idDelete"])){

$item = $itemDAO->buscarItem($_POST["idDelete"]);
$itemDAO ->eliminarItem($item);

            }

if(!empty($_POST["id"])){
$item->setId($_POST["id"]);
$item->setNombre($_POST["nombre"]);
$categoria->setId($_POST['idCategoria']);
$item->setCategoria($categoria);
$administrador->setId($_POST["idAdmin"]);
$item->setAdministrador($administrador);
$item->setNroSerie($_POST["serie"]);
$item->setFabricante($_POST["fabricante"]);
$item->setPrecio($_POST["precio"]);
$item->setPhourl("Empty");

            if($itemDAO->buscarItem($_POST['id'])->getId() == $_POST['id']){
            $itemDAO ->modificarItem($item);
            }else{
            $itemDAO ->registrarItem($item);
            }
}



$response = "";

                             
                  
                                    
                                                                        foreach ($itemDAO ->listarItems() as $item) {

$response .= "<div class='col-6 col-sm-2' id='myTable'>";                                                                        
$response .= "<div class='bg-1-1-1 items' style='width: 173px;'>";
 $response .= "<div class='card'>";
 $response .=   "<div class='card-body' style='padding: 0px'>";
         $response .= "<div class='header-panel text-center'>";
        $response .= "<h4 class='card-title' style='padding: 5px;'>".$item->getNombre()."</h4>";
   $response .= "</div>";
  $response .=  "<div class='text-center'>";
    $response .=  "<p class='card-text' style='padding: 5px;'>";
    $response .= "<i class='fas fa-seedling iconstyleItem'></i>";
    $response .=  "</p>";
  $response .=  "</div>";
   $response .=  "<div class='btn-group'>";
$response .= "<a href='#' name='edit' value='Edit' class='btn btn-primary btn-sm edit_data' id='".$item->getId()."'>Editar</a>";
$response .= "<a  href='#' name='delete' value='Delete' class='btn btn-primary btn-sm delete_data' id='".$item->getId()."'>Eliminar</a>";
$response .= "</div>";
      
    $response .= "</div>";
  $response .= "</div>";
$response .= "</div>";
$response .= "</div>";                                              

                                                                }

echo $response;
exit;











?>
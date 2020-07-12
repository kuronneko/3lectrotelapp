<?php
//insert.php
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;

require config::$itemDAO_url;
require config::$categoriaDAO_url;
require config::$administradorDAO_url;
require config::$tecnicoDAO_url;
require config::$localizacionDAO_url;
require config::$laborDAO_url;

require config::$item_url;
require config::$administrador_url;
require config::$categoria_url;
require config::$tecnico_url;
require config::$localizacion_url;
require config::$labor_url;

/** Controlador ajax para insertar items a una array de tipo sessions
 *  El controlador se inicializa a través de un script de jquery utilizando las librerias de ajax
 */

$item = new item();
$categoria = new categoria();
$administrador = new administrador();
$itemDAO = new itemDAO();
$tecnicoDAO = new tecnicoDAO();


if(!empty($_POST["idItem"])){

            $item = $itemDAO->buscarItem($_POST['idItem']);
            session_start();
                        if(!empty($_SESSION['formItemList'])){
array_push($_SESSION['formItemList'],$item);
            }else{
$_SESSION['formItemList'] = array();
array_push($_SESSION['formItemList'],$item);
            }
            
            if($_POST["idItem"] == 'deleteForm' && !empty($_SESSION['formItemList'])){
  $_SESSION['formItemList'] = array();

}

            
            

}




$response = "";

                
              
             
                 $response .= "<div class='text-center'>";          
            if(!empty($_SESSION['formItemList'])){
            $response .= "<a  href='#' name='nuevoUsuario' value='form' class='btn btn-primary btn-sm' id='nuevoUsuario' data-toggle='modal' data-target='#add_data_Modal' style='width: 100%'>"."Ir al formulario de reporte (".count($_SESSION['formItemList']).")"."</a>";
                        $response .= "<a  href='#' name='deleteForm' value='deleteForm' class='btn btn-outline-danger btn-sm borrarForm' id='deleteForm'>Deshacer reporte</a>";
            }
             $response .= "</div>";
            $response .= "<br>";
          $response .= "<h1 class='text-center'>Generador de reportes</h1>";
          $response .= "<br>";
          $response .= "<p class='message' id='userState' name='userState'></p>";
          $response .= "<div class='container-fluid' style='padding-left: 0px;padding-right: 0px;'>";
            $response .= "<input class='form-control' id='search-criteria' type='text' placeholder='Buscar...'>";
            $response .= "<div class='row'>";

              
                                    
                                                                        foreach ($itemDAO ->listarItems() as $item) {

$response .= "<div class='col-6 col-sm-2'>";                                                                        
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
   $response .=  "<div>";
$response .= "<a  href='#' name='idItem' value='idItem' class='btn btn-primary btn-sm agregar' id='".$item->getId()."' style='width: 100%'>Agregar</a>";
$response .= "</div>"; 
      
    $response .= "</div>";
  $response .= "</div>";
$response .= "</div>";
$response .= "</div>";                                              


                                                                }


echo $response;
exit;

?>
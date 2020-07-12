<?php
//insert.php
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;

require config::$labor_url;
require config::$laborDAO_url;

/** Controlador ajax para el registro y eliminación de labores
 *  El controlador se inicializa a través de un script de jquery utilizando las librerias de ajax
 */

$laborDAO = new laborDAO();
$labor = new labor();

if(!empty($_POST["deleteUser"])){
$labor = $laborDAO->buscarLabor($_POST["deleteUser"]);
$laborDAO ->eliminarLabor($labor);
}

if(!empty($_POST['id'])){
$labor->setId($_POST['id']);
$labor->setNombre($_POST['nombre']);
$laborDAO ->registrarLabor($labor);
}



$response = "";
$response .= "<table class='table'>";
;
    $response .=  "<tbody id='myTable'>";
        foreach ($laborDAO ->listarLabores() as $labor) {
        
        $response .=  "<tr>";
            $response .=   "<td>".$labor->getId()."</td>";
            $response .=   "<td>".$labor->getNombre()."</td>";
                    $response .=   "<td>"."<div class='btn-group'>"."<a  href='#' name='delete' value='Delete' class='btn btn-primary delete_data' id='".$labor->getId()."'>Eliminar</a>"."</div>"."</td>"; 
        $response .= "</tr>";
        
        }
    $response .=  "</tbody>";
$response .= "</table>";


echo $response;
exit;




?>
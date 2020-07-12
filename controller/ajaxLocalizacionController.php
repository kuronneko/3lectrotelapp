<?php
//insert.php
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;

require config::$localizacion_url;
require config::$localizacionDAO_url;

/** Controlador ajax para el registro y eliminación de localizaciones
 *  El controlador se inicializa a través de un script de jquery utilizando las librerias de ajax
 */

$localizacionDAO = new localizacionDAO();
$localizacion = new localizacion();

if(!empty($_POST["deleteUser"])){

$localizacion = $localizacionDAO->buscarLocalizacion($_POST["deleteUser"]);
$localizacionDAO ->eliminarLocalizacion($localizacion);
}

if(!empty($_POST['id'])){
$localizacion->setId($_POST['id']);
$localizacion->setNombre($_POST['nombre']);
$localizacionDAO ->registrarLocalizacion($localizacion);
}



$response = "";
$response .= "<table class='table'>";
;
    $response .=  "<tbody id='myTable'>";
        foreach ($localizacionDAO ->listarLocalizaciones() as $localizacion) {
        
        $response .=  "<tr>";
            $response .=   "<td>".$localizacion->getId()."</td>";
            $response .=   "<td>".$localizacion->getNombre()."</td>";
                    $response .=   "<td>"."<div class='btn-group'>"."<a  href='#' name='delete' value='Delete' class='btn btn-primary delete_data' id='".$localizacion->getId()."'>Eliminar</a>"."</div>"."</td>"; 
        $response .= "</tr>";
        
        }
    $response .=  "</tbody>";
$response .= "</table>";


echo $response;
exit;




?>
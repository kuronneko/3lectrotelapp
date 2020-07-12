<?php
//insert.php
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;

require config::$categoriaDAO_url;
require config::$categoria_url;

/** Controlador ajax para el registro y eliminación de categorías
 *  El controlador se inicializa a través de un script de jquery utilizando las librerias de ajax
 */

$categoriaDAO = new categoriaDAO();
$categoria = new categoria();

if(!empty($_POST["deleteUser"])){

$categoria = $categoriaDAO->buscarCategoria($_POST["deleteUser"]);
$categoriaDAO ->eliminarCategoria($categoria);
}

if(!empty($_POST['id'])){
$categoria->setId($_POST['id']);
$categoria->setNombre($_POST['nombre']);
$categoriaDAO ->registrarCategoria($categoria);
}


$response = "";
$response .= "<table class='table'>";
;
    $response .=  "<tbody id='myTable'>";
        foreach ($categoriaDAO ->listarCategorias() as $categoria) {
        
        $response .=  "<tr>";
            $response .=   "<td>".$categoria->getId()."</td>";
            $response .=   "<td>".$categoria->getNombre()."</td>";
                    $response .=   "<td>"."<div class='btn-group'>"."<a  href='#' name='delete' value='Delete' class='btn btn-primary delete_data' id='".$categoria->getId()."'>Eliminar</a>"."</div>"."</td>"; 
        $response .= "</tr>";
        
        }
    $response .=  "</tbody>";
$response .= "</table>";


echo $response;
exit;




?>
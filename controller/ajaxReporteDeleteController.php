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
require config::$reporteDAO_url;
require config::$incluyeDAO_url;

require config::$item_url;
require config::$administrador_url;
require config::$categoria_url;
require config::$tecnico_url;
require config::$localizacion_url;
require config::$labor_url;
require config::$reporte_url;
require config::$incluye_url;

/** Controlador ajax para eliminar un reporte
 *  El controlador se inicializa a través de un script de jquery utilizando las librerias de ajax
 */

session_start();
$adminSesion = new administradorDAO();
    $reporteDAO = new reporteDAO();
    $incluyeDAO = new incluyeDAO();
    $reporte = new reporte();
$tecnico = new tecnico();
$labor = new labor();
$localizacion = new localizacion();

if(!empty($_POST["deleteUser"]) && !empty($adminSesion->buscarAdministrador($_SESSION[config::$session])->getId())){

$reporte = $reporteDAO->buscarReporte($_POST["deleteUser"]);
$reporteDAO->eliminarReporte($reporte);

}


$response = "";



  foreach($reporteDAO ->listarTodosLosReportes() as $reportes){

  $response .= "<div class='reporte'>";
    $response .= "<div class='card'>";
      $response .= "<div class='card-header'>";
        $response .= "<a class='card-link' data-toggle='collapse' href='#".$reportes->getId()."'>";
          $response .= "<p>Reporte ID: ".$reportes->getId()." <i class='float-right far fa-file-alt iconstyle'></i></p>";
        $response .= "</a>";
      $response .= "</div>";
      $response .= "<div id='".$reportes->getId()."' class='collapse'>";
        $response .= "<div class='card-body'>";
        $response .= "<div><span class='contentTextWarning2'>Nombre Técnico:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getTecnico()->getNombre()."</span></div>";
                $response .= "<div><span class='contentTextWarning2'>Fecha:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getFecha()."</span></div>";
$response .= "<div><span class='contentTextWarning2'>Localización:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getLocalizacion()->getNombre()."</span></div>";
 $response .= "<div><span class='contentTextWarning2'>Labor:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getLabor()->getNombre()."</span></div>"; 
$response .= "<div><span class='contentTextWarning2'>Comentario:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getComentario()."</span></div>"; 
      $response .= "<hr>";
foreach($incluyeDAO ->listarMisItems($reportes->getId()) as $items){
  $response .= "<div><span class='contentTextWarning2'>".$items->getItem()->getId().":</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$items->getItem()->getNombre()." ".$items->getCantidad()."</span></div>";
}
$response .= "<hr>";
$response .= "<a  href='#' name='idReporte' value='idReporte' class='btn btn-primary btn-sm delete_data' id='".$reportes->getId()."'>Eliminar reporte</a>";
        $response .= "</div>";

      $response .= "</div>";

    $response .= "</div>";

$response .= "</div>";

  }




echo $response;
exit;

?>
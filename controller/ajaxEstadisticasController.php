<?php
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;
require config::$incluyeDAO_url;

/** Controlador ajax para traer la información recopilada y determinada a traves de una consulta SQL y formateada con el framework HighCharts
 *  
 */

$incluyeDAO = new incluyeDAO();

if(!empty($_POST["dateItem"])){
$dateItem = $_POST["dateItem"];
print $incluyeDAO ->getTortaItems($dateItem);
}

if(!empty($_POST["dateLabor"])){
$dateLabor = $_POST["dateLabor"];
print $incluyeDAO ->getTortaLabores($dateLabor);
}

if(!empty($_POST["dateLocalizacion"])){
$dateLocalizacion = $_POST["dateLocalizacion"];
print $incluyeDAO ->getTortaLocalizaciones($dateLocalizacion);
}

if(!empty($_POST["btnBD"])){
print $incluyeDAO ->getTotalItems();
}

if(!empty($_POST["btnBDLabores"])){
print $incluyeDAO ->getTotalLabores();
}

if(!empty($_POST["btnBDlocalizaciones"])){
print $incluyeDAO ->getTotalLocalizaciones();
}

if(!empty($_POST["datePrecios"])){
$datePrecios = $_POST["datePrecios"];
print $incluyeDAO ->getPrecios($datePrecios);
}






  //$sql = "SELECT incluye.ID_ITEM, item.NOMBRE_ITEM, sum(CANTIDAD) FROM incluye, item  WHERE (incluye.ID_ITEM=item.ID_ITEM) GROUP BY ID_ITEM ORDER BY sum(CANTIDAD) DESC";

  //SELECT item.NOMBRE_ITEM, sum(incluye.CANTIDAD) as CANTITEMS FROM incluye, item, reporte  WHERE (incluye.ID_REPORTE=reporte.ID_REPORTE) AND (incluye.ID_ITEM=item.ID_ITEM) AND (reporte.FECHA_REPORTE > (now() - interval 30 DAY)) GROUP BY incluye.ID_ITEM ORDER BY CANTITEMS DESC

  //SELECT item.NOMBRE_ITEM, sum(incluye.CANTIDAD) as CANTITEMS FROM incluye, item, reporte  WHERE (incluye.ID_REPORTE=reporte.ID_REPORTE) AND (incluye.ID_ITEM=item.ID_ITEM) AND (reporte.FECHA_REPORTE > (CURRENT_TIMESTAMP - interval 1 DAY)) GROUP BY incluye.ID_ITEM ORDER BY CANTITEMS DESC

//$sql = "SELECT item.NOMBRE_ITEM, sum(incluye.CANTIDAD) as CANTITEMS FROM incluye, item, reporte  WHERE (incluye.ID_REPORTE=reporte.ID_REPORTE) AND (incluye.ID_ITEM=item.ID_ITEM) AND (reporte.FECHA_REPORTE > (DATE('$date') - interval 1 DAY)) GROUP BY incluye.ID_ITEM ORDER BY CANTITEMS DESC";
  //$sql = "SELECT incluye.ID_ITEM, item.NOMBRE_ITEM, sum(CANTIDAD) FROM incluye, item  WHERE (incluye.ID_ITEM=item.ID_ITEM) GROUP BY ID_ITEM ORDER BY sum(CANTIDAD) DESC";

  //SELECT item.NOMBRE_ITEM, sum(incluye.CANTIDAD) as CANTITEMS FROM incluye, item, reporte  WHERE (incluye.ID_REPORTE=reporte.ID_REPORTE) AND (incluye.ID_ITEM=item.ID_ITEM) AND (reporte.FECHA_REPORTE > (now() - interval 30 DAY)) GROUP BY incluye.ID_ITEM ORDER BY CANTITEMS DESC

  //SELECT item.NOMBRE_ITEM, sum(incluye.CANTIDAD) as CANTITEMS FROM incluye, item, reporte  WHERE (incluye.ID_REPORTE=reporte.ID_REPORTE) AND (incluye.ID_ITEM=item.ID_ITEM) AND (reporte.FECHA_REPORTE > (CURRENT_TIMESTAMP - interval 1 DAY)) GROUP BY incluye.ID_ITEM ORDER BY CANTITEMS DESC

//$sql = "SELECT item.NOMBRE_ITEM, sum(incluye.CANTIDAD) as CANTITEMS FROM incluye, item, reporte  WHERE (incluye.ID_REPORTE=reporte.ID_REPORTE) AND (incluye.ID_ITEM=item.ID_ITEM) AND (reporte.FECHA_REPORTE > (DATE('$date') - interval 1 DAY)) GROUP BY incluye.ID_ITEM ORDER BY CANTITEMS DESC";


//SELECT item.NOMBRE_ITEM, sum(item.PRECIOEST_ITEM) as CANTITEMS, sum(incluye.CANTIDAD) as CANTITEMS2 FROM incluye, item, reporte WHERE (reporte.ID_REPORTE=incluye.ID_REPORTE) AND (incluye.ID_ITEM=item.ID_ITEM) AND (reporte.FECHA_REPORTE BETWEEN DATE('2020-07-05' - INTERVAL 30 DAY) AND '2020-07-05') GROUP BY item.NOMBRE_ITEM ORDER BY CANTITEMS DESC 
?>

<?php


/**
 * Class incluyeDAO
 */
class incluyeDAO extends conexion
{

    /** Sirve para registrar un reporte, con sus respectivos items y cantidad en la tabla incluye
     * @param $incluye
     */
    public function registrarIncluye($incluye){
$this->conectar();
$ID_REPORTE = $incluye->getReporte()->getId();

foreach($incluye->getItem() as $items){

   $ID_ITEM = $items->getId();
   $sql = "SELECT * FROM incluye WHERE ID_ITEM='$ID_ITEM'  AND  ID_REPORTE='$ID_REPORTE'";
   $result = $this->conexion->query($sql);
   $row = $result->fetch_assoc();
   if ($result->num_rows > 0) {

   	$CANTIDAD = $row["CANTIDAD"]+1;
   	$sqlUpdate = "UPDATE incluye SET CANTIDAD='$CANTIDAD' WHERE ID_REPORTE='$ID_REPORTE' AND ID_ITEM='$ID_ITEM'";
   	$this->conexion->query($sqlUpdate);

   }else{
   $CANTIDAD = 1;
   $sqlNormal = "INSERT INTO incluye (ID_REPORTE, ID_ITEM, CANTIDAD) VALUES ('$ID_REPORTE', '$ID_ITEM','$CANTIDAD')";
   $this->conexion->query($sqlNormal);

   }



}
      
       
    }


    /** Sirve para listar los items asociados a un reporte determinado
     * @param $idReporte
     * @return mixed
     */
    public function listarMisItems($idReporte){
$this->conectar();
    $sql = "SELECT DISTINCT incluye.ID_REPORTE, incluye.ID_ITEM, CANTIDAD FROM incluye WHERE ID_REPORTE = '$idReporte'";

    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

$item = new item();
$reporte = new reporte();
$incluye = new incluye();

$reporteDAO = new reporteDAO();
$itemDAO = new itemDAO();
$incluyeDAO = new incluyeDAO();

$reporte = $reporteDAO->buscarReporte($row["ID_REPORTE"]);
$incluye->setReporte($reporte);
$item = $itemDAO->buscarItem($row["ID_ITEM"]);
//$itemList[] = $item;
$incluye->setItem($item);
$incluye->setCantidad($row["CANTIDAD"]);

$incluyeList[] = $incluye;
       }

    }
    
    return $incluyeList;
}


    /** Sirve para traer información referente a los items especificados en los reportes en un periodo de tiempo
     * @param $dateItem
     * @return false|string
     */
    public function getTortaItems($dateItem){
      $this->conectar();
  $tmp = array();

    $sql = "SELECT item.NOMBRE_ITEM, sum(incluye.CANTIDAD) as CANTITEMS FROM incluye, item, reporte  WHERE (incluye.ID_REPORTE=reporte.ID_REPORTE) AND (incluye.ID_ITEM=item.ID_ITEM) AND (reporte.FECHA_REPORTE BETWEEN DATE('$dateItem' - INTERVAL 30 DAY) AND '$dateItem') GROUP BY incluye.ID_ITEM ORDER BY CANTITEMS DESC";

    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            array_push($tmp, array($row["NOMBRE_ITEM"], $row["CANTITEMS"]));
        }
    }else{
        array_push($tmp, array("NODATE", "nodate"));
    }


    $this->conexion->close();
    return json_encode($tmp, JSON_NUMERIC_CHECK);

}


    /** Sirve para traer las labores especificadas en los reportes en un periodo de tiempo
     * @param $dateLabor
     * @return false|string
     */
    public function getTortaLabores($dateLabor){
      $this->conectar();
  $tmp = array();

    $sql = "SELECT labor.NOMBRE_LABOR, COUNT(labor.NOMBRE_LABOR) as CANTLABORES FROM reporte, labor, incluye WHERE (reporte.ID_LABOR=labor.ID_LABOR) AND (incluye.ID_REPORTE=reporte.ID_REPORTE) AND (reporte.FECHA_REPORTE BETWEEN DATE('$dateLabor' - INTERVAL 30 DAY) AND '$dateLabor') GROUP BY labor.ID_LABOR ORDER BY CANTLABORES DESC";

    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            array_push($tmp, array($row["NOMBRE_LABOR"], $row["CANTLABORES"]));
        }
    }else{
        array_push($tmp, array("NODATE", "nodate"));
    }


$this->conexion->close();
    return json_encode($tmp, JSON_NUMERIC_CHECK);

}


    /** Sirve para traer las localizaciones especificadas en los reportes en un periodo de tiempo
     * @param $dateLocalizacion
     * @return false|string
     */
    public function getTortaLocalizaciones($dateLocalizacion){
      $this->conectar();
  $tmp = array();

    $sql = "SELECT localizacion.NOMBRE_LOCALIDAD, COUNT(localizacion.NOMBRE_LOCALIDAD) as CANTLOCALIDAD FROM reporte, localizacion, incluye WHERE (reporte.ID_LOCALIDAD=localizacion.ID_LOCALIDAD) AND (incluye.ID_REPORTE=reporte.ID_REPORTE) AND (reporte.FECHA_REPORTE BETWEEN DATE('$dateLocalizacion' - INTERVAL 30 DAY) AND '$dateLocalizacion') GROUP BY localizacion.ID_LOCALIDAD ORDER BY CANTLOCALIDAD DESC";

    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            array_push($tmp, array($row["NOMBRE_LOCALIDAD"], $row["CANTLOCALIDAD"]));
        }
    }else{
        array_push($tmp, array("NODATE", "nodate"));
    }


$this->conexion->close();
    return json_encode($tmp, JSON_NUMERIC_CHECK);

}


    /** Sirve para traer el total de items especificados en los reportes
     * 
     * @return false|string
     */
    public function getTotalItems(){
      $this->conectar();
  $tmp = array();

    $sql = "SELECT item.NOMBRE_ITEM, sum(incluye.CANTIDAD) as CANTITEMS FROM incluye, item  WHERE (incluye.ID_ITEM=item.ID_ITEM) GROUP BY incluye.ID_ITEM ORDER BY CANTITEMS DESC";

    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
          array_push($tmp, array($row["NOMBRE_ITEM"], $row["CANTITEMS"]));
      }
    }

$this->conexion->close();
    return json_encode($tmp, JSON_NUMERIC_CHECK);

}


    /** Sirve para traer el total de labores especificadas en los reportes 
     * 
     * @return false|string
     */
    public function getTotalLabores(){
      $this->conectar();
  $tmp = array();

  $sql = "SELECT DISTINCT labor.NOMBRE_LABOR, COUNT(labor.NOMBRE_LABOR) as CANTLABORES FROM reporte, labor WHERE (reporte.ID_LABOR=labor.ID_LABOR) GROUP BY labor.ID_LABOR ORDER BY CANTLABORES DESC";

      $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
          array_push($tmp, array($row["NOMBRE_LABOR"], $row["CANTLABORES"]));
      }
    }

$this->conexion->close();
    return json_encode($tmp, JSON_NUMERIC_CHECK);

}


    /** Sirve para traer el total de  localizaciones especificadas en los reportes 
     * 
     * @return false|string
     */
    public function getTotalLocalizaciones(){
      $this->conectar();
  $tmp = array();

  $sql = "SELECT localizacion.NOMBRE_LOCALIDAD, COUNT(localizacion.NOMBRE_LOCALIDAD) as CANTLOCALIDAD FROM reporte, localizacion WHERE (reporte.ID_LOCALIDAD=localizacion.ID_LOCALIDAD) GROUP BY localizacion.ID_LOCALIDAD ORDER BY CANTLOCALIDAD DESC";

      $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
          array_push($tmp, array($row["NOMBRE_LOCALIDAD"], $row["CANTLOCALIDAD"]));
      }
    }


$this->conexion->close();
    return json_encode($tmp, JSON_NUMERIC_CHECK);

}


    /** Sirve para traer el total de precios segmetados por mes y elemento
     * 
     * @return false|string
     */
    public function getPrecios($datePrecios){
      $this->conectar();

  $tmp = array();

    $sql = "SELECT item.NOMBRE_ITEM, sum(item.PRECIOEST_ITEM) as CANTITEMS FROM incluye, item, reporte WHERE (reporte.ID_REPORTE=incluye.ID_REPORTE) AND (incluye.ID_ITEM=item.ID_ITEM) AND (reporte.FECHA_REPORTE BETWEEN DATE('$datePrecios' - INTERVAL 30 DAY) AND '$datePrecios') GROUP BY item.NOMBRE_ITEM ORDER BY CANTITEMS DESC";

    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            array_push($tmp, array($row["NOMBRE_ITEM"], $row["CANTITEMS"]));
        }
    }else{
        array_push($tmp, array("NODATE", "nodate"));
    }

$this->conexion->close();
    return json_encode($tmp, JSON_NUMERIC_CHECK);

}




}

?>
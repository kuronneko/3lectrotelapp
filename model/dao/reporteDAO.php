
<?php


/**
 * Class reporteDAO
 */
class reporteDAO extends conexion
{

    /** Sirve para registrar un reporte
     * @param $reporte
     */
    public function registrarReporte($reporte){
$this->conectar();
$ID_REPORTE = $reporte->getId();
$ID_LABOR = $reporte->getLabor()->getId();
$ID_LOCALIDAD = $reporte->getLocalizacion()->getId();
$ID_TECNICO = $reporte->getTecnico()->getId();
$FECHA_REPORTE = $reporte->getFecha();
$COMENTARIO_REPORTE = $reporte->getComentario();


       $sql = "INSERT INTO reporte (ID_REPORTE, ID_LABOR, ID_TECNICO, ID_LOCALIDAD, FECHA_REPORTE, COMENTARIO_REPORTE) VALUES ('$ID_REPORTE', '$ID_LABOR','$ID_TECNICO','$ID_LOCALIDAD','$FECHA_REPORTE','$COMENTARIO_REPORTE')";
       $this->conexion->query($sql);
   $this->conexion->close();
       
    }

    /** Sirve para eliminar un reporte
     * @param $reporte
     */
    public function eliminarReporte($reporte){
        $this->conectar();
       $ID_REPORTE = $reporte->getId();
       $sql = "DELETE FROM reporte WHERE ID_REPORTE='$ID_REPORTE'";
       $this->conexion->query($sql);$this->conexion->close();
    }

    /** Sirve para listar los reportes asociados al usuario técnico
     * @param $idTecnico
     * @return mixed
     */
    public function listarMisReportes($idTecnico){
$this->conectar();

    $sql = "SELECT DISTINCT * from reporte, labor, localizacion, tecnico WHERE (reporte.ID_LABOR=labor.ID_LABOR) AND (reporte.ID_LOCALIDAD=localizacion.ID_LOCALIDAD) AND (reporte.ID_TECNICO=tecnico.ID_TECNICO) AND tecnico.ID_TECNICO='$idTecnico' ORDER BY reporte.FECHA_REPORTE DESC";

    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

$reporte = new reporte();
$tecnico = new tecnico();
$labor = new labor();
$localizacion = new localizacion();
$reporteDAO = new reporteDAO();
$tecnicoDAO = new tecnicoDAO();
$laborDAO = new laborDAO();
$localizacionDAO = new localizacionDAO();

$reporte->setId($row["ID_REPORTE"]);
$labor = $laborDAO->buscarLabor($row["ID_LABOR"]);
$localizacion = $localizacionDAO->buscarLocalizacion($row["ID_LOCALIDAD"]);
$tecnico = $tecnicoDAO->buscarTecnico($row["ID_TECNICO"]);
$reporte->setLabor($labor);
$reporte->setLocalizacion($localizacion);
$reporte->setTecnico($tecnico);
$reporte->setFecha($row["FECHA_REPORTE"]);
$reporte->setComentario($row["COMENTARIO_REPORTE"]);


$reporteList[] = $reporte;
       }

    }
    $this->conexion->close();
    return $reporteList;
    
}

    /** Sirve para listar todos los reportes recopilados en el sistema
     * @return mixed
     */
    public function listarTodosLosReportes(){
$this->conectar();
    $sql = "SELECT DISTINCT * from reporte, labor, localizacion, tecnico WHERE (reporte.ID_LABOR=labor.ID_LABOR) AND (reporte.ID_LOCALIDAD=localizacion.ID_LOCALIDAD) AND (reporte.ID_TECNICO=tecnico.ID_TECNICO) ORDER BY reporte.FECHA_REPORTE DESC";

    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

$reporte = new reporte();
$tecnico = new tecnico();
$labor = new labor();
$localizacion = new localizacion();
$reporteDAO = new reporteDAO();
$tecnicoDAO = new tecnicoDAO();
$laborDAO = new laborDAO();
$localizacionDAO = new localizacionDAO();

$reporte->setId($row["ID_REPORTE"]);
$labor = $laborDAO->buscarLabor($row["ID_LABOR"]);
$localizacion = $localizacionDAO->buscarLocalizacion($row["ID_LOCALIDAD"]);
$tecnico = $tecnicoDAO->buscarTecnico($row["ID_TECNICO"]);
$reporte->setLabor($labor);
$reporte->setLocalizacion($localizacion);
$reporte->setTecnico($tecnico);
$reporte->setFecha($row["FECHA_REPORTE"]);
$reporte->setComentario($row["COMENTARIO_REPORTE"]);


$reporteList[] = $reporte;
       }

    }
    $this->conexion->close();
    return $reporteList;
    
}


    /** Sirve para buscar un reporte
     * @param $idReporte
     * @return reporte
     */
    public function buscarReporte($idReporte){
        $this->conectar();
$reporte = new reporte();
$tecnico = new tecnico();
$labor = new labor();
$localizacion = new localizacion();
$reporteDAO = new reporteDAO();
$tecnicoDAO = new tecnicoDAO();
$laborDAO = new laborDAO();
$localizacionDAO = new localizacionDAO();

    $sql = "SELECT DISTINCT * from reporte, labor, localizacion, tecnico WHERE (reporte.ID_LABOR=labor.ID_LABOR) AND (reporte.ID_LOCALIDAD=localizacion.ID_LOCALIDAD) AND (reporte.ID_TECNICO=tecnico.ID_TECNICO) AND ID_REPORTE='$idReporte'";
$result = $this->conexion->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {


$reporte->setId($row["ID_REPORTE"]);
$labor = $laborDAO->buscarLabor($row["ID_LABOR"]);
$localizacion = $localizacionDAO->buscarLocalizacion($row["ID_LOCALIDAD"]);
$tecnico = $tecnicoDAO->buscarTecnico($row["ID_TECNICO"]);
$reporte->setLabor($labor);
$reporte->setLocalizacion($localizacion);
$reporte->setTecnico($tecnico);
$reporte->setFecha($row["FECHA_REPORTE"]);
$reporte->setComentario($row["COMENTARIO_REPORTE"]);
    }
    }

return $reporte;

  }



}

?>
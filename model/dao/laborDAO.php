<?php


/**
 * Class laborDAO
 */
class laborDAO extends conexion{

    /** Sirve para registrar una nuva labor
     * @param $labor
     */
    public function registrarLabor($labor){
$this->conectar();
       $ID_LABOR = $labor->getId();
       $NOMBRE_LABOR = $labor->getNombre();

       $sql = "INSERT INTO labor (ID_LABOR, NOMBRE_LABOR) VALUES ('$ID_LABOR', '$NOMBRE_LABOR')";
       $this->conexion->query($sql);$this->conexion->close();
       
    }

    /** Sirve para listar las labores
     * @return mixed
     */
    public function listarLabores(){
 $this->conectar();
    $sql = "SELECT * FROM labor";
    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$labor = new labor();
$labor->setId($row["ID_LABOR"]);
$labor->setNombre($row["NOMBRE_LABOR"]);
$laborList[] = $labor;
       }

    }
    $this->conexion->close();
    return $laborList;
}

    /** Sirve para eliminar una labor
     * @param $labor
     */
    public function eliminarLabor($labor){
      $this->conectar();
       $ID_LABOR = $labor->getId();
       $sql = "DELETE FROM labor WHERE ID_LABOR='$ID_LABOR'";
       $this->conexion->query($sql);$this->conexion->close();
    }


    /** Sirve para buscar una labor
     * @param $id
     * @return labor
     */
    public function buscarLabor($id){
      $this->conectar();
 $labor = new labor();
$sql = "SELECT * FROM labor WHERE ID_LABOR='$id'";
$result = $this->conexion->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$labor->setId($row["ID_LABOR"]);
$labor->setNombre($row["NOMBRE_LABOR"]);

    }
 }

return $labor;

  }



}

?>
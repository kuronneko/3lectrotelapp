<?php


/**
 * Class localizacionDAO
 */
class localizacionDAO extends conexion{

    /** Sirve para registrar una nueva localizacion
     * @param $localizacion
     */
    public function registrarLocalizacion($localizacion){
$this->conectar();
       $ID_LOCALIDAD = $localizacion->getId();
       $NOMBRE_LOCALIDAD = $localizacion->getNombre();

       $sql = "INSERT INTO localizacion (ID_LOCALIDAD, NOMBRE_LOCALIDAD) VALUES ('$ID_LOCALIDAD', '$NOMBRE_LOCALIDAD')";
       $this->conexion->query($sql);$this->conexion->close();
       
    }

    /** Sirve para listar las localizaciones
     * @return mixed
     */
    public function listarLocalizaciones(){
 $this->conectar();
    $sql = "SELECT * FROM localizacion";
    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$localizacion = new localizacion();
$localizacion->setId($row["ID_LOCALIDAD"]);
$localizacion->setNombre($row["NOMBRE_LOCALIDAD"]);
$localizacionList[] = $localizacion;
       }

    }
    $this->conexion->close();
    return $localizacionList;
}

    /** Sirve para eliminar una localizacion
     * @param $localizacion
     */
    public function eliminarLocalizacion($localizacion){
      $this->conectar();
        $ID_LOCALIDAD = $localizacion->getId();
       $sql = "DELETE FROM localizacion WHERE ID_LOCALIDAD='$ID_LOCALIDAD'";
       $this->conexion->query($sql);$this->conexion->close();
    }


    /** Sirve para buscar una localizacion
     * @param $id
     * @return localizacion
     */
    public function buscarLocalizacion($id){
      $this->conectar();
 $localizacion = new localizacion();
$sql = "SELECT * FROM localizacion WHERE ID_LOCALIDAD='$id'";
$result = $this->conexion->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$localizacion->setId($row["ID_LOCALIDAD"]);
$localizacion->setNombre($row["NOMBRE_LOCALIDAD"]);

    }
 }

return $localizacion;

  }



}

?>
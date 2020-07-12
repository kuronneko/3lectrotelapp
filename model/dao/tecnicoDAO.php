<?php


/**
 * Class tecnicoDAO
 */
class tecnicoDAO extends conexion
{
    /** Sirve para registrar a un nuevo usuario de tipo tecnico
     * @param $tecnico
     */
    public function registrarTecnico($tecnico){
$this->conectar();
$ID_TECNICO = $tecnico->getId();
$NOMBRE_TECNICO = $tecnico->getNombre();
$APELLIDO_TECNICO = $tecnico->getApellido();
$EMAIL_TECNICO = $tecnico->getEmail();
$CONTRASENA_TECNICO = $tecnico->getContrasena();
$ACCOUNT_TYPE = $tecnico->getAccType();
$EDAD_TECNICO = $tecnico->getEdad();
$DOMICILIO_TECNICO = $tecnico->getDomicilio();

       $sql = "INSERT INTO tecnico (ID_TECNICO, NOMBRE_TECNICO, APELLIDO_TECNICO, EMAIL_TECNICO, CONTRASENA_TECNICO, ACCOUNT_TYPE, EDAD_TECNICO, DOMICILIO_TECNICO) VALUES ('$ID_TECNICO', '$NOMBRE_TECNICO','$APELLIDO_TECNICO','$EMAIL_TECNICO','$CONTRASENA_TECNICO','$ACCOUNT_TYPE','$EDAD_TECNICO','$DOMICILIO_TECNICO')";
       $this->conexion->query($sql);$this->conexion->close();
       
    }


    /** Sirve para eliminar a un usuario de tipo tecnico
     * @param $tecnico
     */
    public function eliminarTecnico($tecnico){
        $this->conectar();
       $ID_TECNICO = $tecnico->getId();
       $sql = "DELETE FROM tecnico WHERE ID_TECNICO='$ID_TECNICO'";
       $this->conexion->query($sql);$this->conexion->close();
    }

    /** Sirve para listar a los usuarios de tipo tecnico
     * @return mixed
     */
    public function listarTecnicos(){
 $this->conectar();
    $sql = "SELECT * FROM tecnico";
    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$tecnico = new tecnico();
$tecnico->setId($row["ID_TECNICO"]);
$tecnico->setNombre($row["NOMBRE_TECNICO"]);
$tecnico->setApellido($row["APELLIDO_TECNICO"]);
$tecnico->setEmail($row["EMAIL_TECNICO"]);
$tecnico->setContrasena($row["CONTRASENA_TECNICO"]);
$tecnico->setAccType($row["ACCOUNT_TYPE"]);
$tecnico->setEdad($row["EDAD_TECNICO"]);
$tecnico->setDomicilio($row["DOMICILIO_TECNICO"]);
$tenicoList[] = $tecnico;
       }

    }
    $this->conexion->close();
    return $tenicoList;
}

    /** Sirve para modificar a un usuario de tipo tecnico
     * @param $tecnico
     */
    public function modificarTecnico($tecnico){
        $this->conectar();
$ID_TECNICO = $tecnico->getId();
$NOMBRE_TECNICO = $tecnico->getNombre();
$APELLIDO_TECNICO = $tecnico->getApellido();
$EMAIL_TECNICO = $tecnico->getEmail();
$CONTRASENA_TECNICO = $tecnico->getContrasena();
$ACCOUNT_TYPE = $tecnico->getAccType();
$EDAD_TECNICO = $tecnico->getEdad();
$DOMICILIO_TECNICO = $tecnico->getDomicilio();

$sql = "UPDATE tecnico SET NOMBRE_TECNICO='$NOMBRE_TECNICO',APELLIDO_TECNICO='$APELLIDO_TECNICO',EMAIL_TECNICO='$EMAIL_TECNICO',CONTRASENA_TECNICO='$CONTRASENA_TECNICO',ACCOUNT_TYPE='$ACCOUNT_TYPE',EDAD_TECNICO='$EDAD_TECNICO',DOMICILIO_TECNICO='$DOMICILIO_TECNICO' WHERE ID_TECNICO='$ID_TECNICO'";
$this->conexion->query($sql);$this->conexion->close();

  }

    /** Sirve para buscar usuarios de tipo tecnico
     * @param $id
     * @return tecnico
     */
    public function buscarTecnico($id){
        $this->conectar();
 $tecnico = new tecnico();
$sql = "SELECT * FROM tecnico WHERE ID_TECNICO='$id'";
$result = $this->conexion->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$tecnico->setId($row["ID_TECNICO"]);
$tecnico->setNombre($row["NOMBRE_TECNICO"]);
$tecnico->setApellido($row["APELLIDO_TECNICO"]);
$tecnico->setEmail($row["EMAIL_TECNICO"]);
$tecnico->setContrasena($row["CONTRASENA_TECNICO"]);
$tecnico->setAccType($row["ACCOUNT_TYPE"]);
$tecnico->setEdad($row["EDAD_TECNICO"]);
$tecnico->setDomicilio($row["DOMICILIO_TECNICO"]);
    }
    }

return $tecnico;

  }

    /** Sirve para buscar usuarios de tipo tecnico a través del email
     * @param $email
     * @return tecnico
     */
      public function buscarTecnico2($email){
        $this->conectar();
 $tecnico = new tecnico();
$sql = "SELECT * FROM tecnico WHERE EMAIL_TECNICO='$email'";
$result = $this->conexion->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$tecnico->setId($row["ID_TECNICO"]);
$tecnico->setNombre($row["NOMBRE_TECNICO"]);
$tecnico->setApellido($row["APELLIDO_TECNICO"]);
$tecnico->setEmail($row["EMAIL_TECNICO"]);
$tecnico->setContrasena($row["CONTRASENA_TECNICO"]);
$tecnico->setAccType($row["ACCOUNT_TYPE"]);
$tecnico->setEdad($row["EDAD_TECNICO"]);
$tecnico->setDomicilio($row["DOMICILIO_TECNICO"]);
    }
    }

return $tecnico;

  }


}
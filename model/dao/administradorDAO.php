<?php


/**
 * Class administradorDAO
 */
class administradorDAO extends conexion
{
    /** Sirve para registrar a un nuevo usuario de tipo administrador
     * @param $administrador
     */
    public function registrarAdministrador($administrador){
$this->conectar();
$ID_ADMIN = $administrador->getId();
$NOMBRE_ADMIN = $administrador->getNombre();
$APELLIDO_ADMIN = $administrador->getApellido();
$EMAIL_ADMIN = $administrador->getEmail();
$CONTRASENA_ADMIN = $administrador->getContrasena();
$ACCOUNT_TYPE = $administrador->getAccType();
$EDAD_ADMIN = $administrador->getEdad();
$DOMICILIO_ADMIN = $administrador->getDomicilio();

       $sql = "INSERT INTO administrador (ID_ADMIN, NOMBRE_ADMIN, APELLIDO_ADMIN, EMAIL_ADMIN, CONTRASENA_ADMIN, ACCOUNT_TYPE, EDAD_ADMIN, DOMICILIO_ADMIN) VALUES ('$ID_ADMIN', '$NOMBRE_ADMIN','$APELLIDO_ADMIN','$EMAIL_ADMIN','$CONTRASENA_ADMIN','$ACCOUNT_TYPE','$EDAD_ADMIN','$DOMICILIO_ADMIN')";
       $this->conexion->query($sql);$this->conexion->close();
       
    }


    /** Sirve para eliminar a un usuario de tipo administrador
     * @param $administrador
     */
    public function eliminarAdministrador($administrador){
        $this->conectar();
       $ID_ADMIN = $administrador->getId();
       $sql = "DELETE FROM administrador WHERE ID_ADMIN='$ID_ADMIN'";
       $this->conexion->query($sql);$this->conexion->close();
    }

    /** Sirve para listar a los usuarios de tipo administrador
     * @return mixed
     */
    public function listarAdministradores(){
 $this->conectar();
    $sql = "SELECT * FROM administrador";
    $result = $this->conexion->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$administrador = new administrador();
$administrador->setId($row["ID_ADMIN"]);
$administrador->setNombre($row["NOMBRE_ADMIN"]);
$administrador->setApellido($row["APELLIDO_ADMIN"]);
$administrador->setEmail($row["EMAIL_ADMIN"]);
$administrador->setContrasena($row["CONTRASENA_ADMIN"]);
$administrador->setAccType($row["ACCOUNT_TYPE"]);
$administrador->setEdad($row["EDAD_ADMIN"]);
$administrador->setDomicilio($row["DOMICILIO_ADMIN"]);
$adminList[] = $administrador;
       }

    }
    $this->conexion->close();
    return $adminList;
}

    /** Sirve para modificar a los usuarios de tipo administrador
     * @param $administrador
     */
    public function modificarAdministrador($administrador){
        $this->conectar();
$ID_ADMIN = $administrador->getId();
$NOMBRE_ADMIN = $administrador->getNombre();
$APELLIDO_ADMIN = $administrador->getApellido();
$EMAIL_ADMIN = $administrador->getEmail();
$CONTRASENA_ADMIN = $administrador->getContrasena();
$ACCOUNT_TYPE = $administrador->getAccType();
$EDAD_ADMIN = $administrador->getEdad();
$DOMICILIO_ADMIN = $administrador->getDomicilio();

$sql = "UPDATE administrador SET NOMBRE_ADMIN='$NOMBRE_ADMIN',APELLIDO_ADMIN='$APELLIDO_ADMIN',EMAIL_ADMIN='$EMAIL_ADMIN',CONTRASENA_ADMIN='$CONTRASENA_ADMIN',ACCOUNT_TYPE='$ACCOUNT_TYPE',EDAD_ADMIN='$EDAD_ADMIN',DOMICILIO_ADMIN='$DOMICILIO_ADMIN' WHERE ID_ADMIN='$ID_ADMIN'";
$this->conexion->query($sql);$this->conexion->close();

  }

    /** Sirve para buscar a un usuario de tipo administrador
     * @param $id
     * @return administrador
     */
    public function buscarAdministrador($id){
        $this->conectar();
 $administrador = new administrador();
$sql = "SELECT * FROM administrador WHERE ID_ADMIN='$id'";
$result = $this->conexion->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$administrador->setId($row["ID_ADMIN"]);
$administrador->setNombre($row["NOMBRE_ADMIN"]);
$administrador->setApellido($row["APELLIDO_ADMIN"]);
$administrador->setEmail($row["EMAIL_ADMIN"]);
$administrador->setContrasena($row["CONTRASENA_ADMIN"]);
$administrador->setAccType($row["ACCOUNT_TYPE"]);
$administrador->setEdad($row["EDAD_ADMIN"]);
$administrador->setDomicilio($row["DOMICILIO_ADMIN"]);
    }
    }

return $administrador;

  }

    /** Sirve para buscar a un usuario de tipo administrador a través del email
     * @param $email
     * @return administrador
     */
      public function buscarAdministrador2($email){
        $this->conectar();
 $administrador = new administrador();
$sql = "SELECT * FROM administrador WHERE EMAIL_ADMIN='$email'";
$result = $this->conexion->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
$administrador->setId($row["ID_ADMIN"]);
$administrador->setNombre($row["NOMBRE_ADMIN"]);
$administrador->setApellido($row["APELLIDO_ADMIN"]);
$administrador->setEmail($row["EMAIL_ADMIN"]);
$administrador->setContrasena($row["CONTRASENA_ADMIN"]);
$administrador->setAccType($row["ACCOUNT_TYPE"]);
$administrador->setEdad($row["EDAD_ADMIN"]);
$administrador->setDomicilio($row["DOMICILIO_ADMIN"]);
    }
    }

return $administrador;

  }




}
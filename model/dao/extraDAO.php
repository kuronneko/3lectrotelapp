<?php

/**
 * Class extraDAO
 */
class extraDAO extends conexion{

    /** Sirve para verificar la existencia de registros de ip en la base de datos
     * @param $ip
     */
function checkIP($ip){
$this->conectar();
$sql = "SELECT COUNT(*) as loginattempts FROM `ip` WHERE `address` LIKE '$ip' AND `timestamp` > (now() - interval 29 minute)";

       $result = $this->conexion->query($sql);
       $row = $result->fetch_assoc();
       $this->conexion->close();

       return $row['loginattempts'];
}

    /** Sirve para borrar todas las IP asociadas al parametro
     * @param $ip
     */
function deleteIP($ip){
  $this->conectar();
$sql = "DELETE FROM ip WHERE `address`= '$ip'";
$this->conexion->query($sql);$this->conexion->close();
}

    /** Sirve para insertar una IP en la base de datos
     * @param $ip
     */
function insertIP($ip){
  $this->conectar();
$sql = "INSERT INTO `ip` (`address` ,`timestamp`)VALUES ('$ip',CURRENT_TIMESTAMP)";
$this->conexion->query($sql);$this->conexion->close();
}



}


?>
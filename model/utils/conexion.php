<?php


/** Sirve para establecer conexión con el servidor
 * Class conexion
 */
class conexion
{
private $user = "root";
private $password = "";
private $server = "localhost";
private $database = "electrotelfinal";
protected $conexion;

function __construct() {

}

public function conectar(){
        $this->conexion = new mysqli($this->server, $this->user, $this->password, $this->database);

        if ($this->conexion->connect_error) {
            die("Connection failed: " . $this->conexion->connect_error);
            echo "<script type='text/javascript'>alert('DATABASE IS MISSING!')</script>";
        }else{
        	//echo "<script type='text/javascript'>alert('GOOD!')</script>";
        }
}





}
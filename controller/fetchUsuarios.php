<?php

include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;

require config::$administradorDAO_url;
require config::$tecnicoDAO_url;
require config::$administrador_url;
require config::$tecnico_url;


/** Permite traer información referente a las cuentas de usuario, ya sea de tipo Administrador o Técnico
 *  Importante: este se inicializa a través de un script de jquery y las librerias de ajax
 */
if(isset($_POST["idAdmin"])){

$administradorDAO = new administradorDAO();
$administrador = new administrador();

$administrador = $administradorDAO->buscarAdministrador($_POST["idAdmin"]);

    $json = array(
        'id' => $administrador->getId(),
        'nombre' => $administrador->getNombre(),
        'apellido' => $administrador->getApellido(),
        'email' => $administrador->getEmail(),
        'contrasena' => $administrador->getContrasena(),
        'AccType' => $administrador->getAccType(),
        'edad' => $administrador->getEdad(),
        'domicilio' => $administrador->getDomicilio(),
    );
echo json_encode($json); 
}else{

$tecnicoDAO = new tecnicoDAO();
$tecnico = new tecnico();
$tecnico = $tecnicoDAO->buscarTecnico($_POST["idTecnico"]);

    $json = array(
        'id' => $tecnico->getId(),
        'nombre' => $tecnico->getNombre(),
        'apellido' => $tecnico->getApellido(),
        'email' => $tecnico->getEmail(),
        'contrasena' => $tecnico->getContrasena(),
        'AccType' => $tecnico->getAccType(),
        'edad' => $tecnico->getEdad(),
        'domicilio' => $tecnico->getDomicilio(),
    );
echo json_encode($json); 
}





 //fetch.php  

?>
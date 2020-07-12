<?php

include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;
require config::$administradorDAO_url;
require config::$tecnicoDAO_url;
require config::$administrador_url;
require config::$tecnico_url;
require config::$extraDAO;

session_start();


/** Sirve para destruir la sesión asociada al usuario de la sesión
 *
 */
    if(isset($_GET['Logout'])){
        session_destroy();
        header('location:'.config::$index.'');
    }

/** Sirve para verificar los parámetros de acceso al sistema
 * También cuenta con un sistema para bloquear la ip en caso de múltiples intentos de acceso fallidos
 */
        if(isset($_POST['Login'])) {
       $ip = $_SERVER["REMOTE_ADDR"];
       $user = $_POST['User'];
       $pass = $_POST['Password'];

                $extraDAO = new extraDAO();
                $administradorDAO = new administradorDAO();
                $administrador = new administrador();
                $tecnicoDAO = new tecnicoDAO();
                $tecnico = new tecnico();

                if($extraDAO->checkIP($ip) > config::$loginattemptsQuantity){
                header('location: '.config::$loginattempts.' ');
                }else{

                $administrador = $administradorDAO->buscarAdministrador2($user);
                $tecnico = $tecnicoDAO->buscarTecnico2($user);

                if($administrador->getEmail() == $user && $administrador->getContrasena() == md5($pass)){
                $_SESSION[config::$session]=$administrador->getId();
                $extraDAO->deleteIP($ip);
                header('location: '.config::$adminPanel.'');
                 }else if($tecnico->getEmail() == $user && $tecnico->getContrasena() == md5($pass)){
                $_SESSION[config::$session]=$tecnico->getId();
                $extraDAO->deleteIP($ip);
                header('location: '.config::$tecnicoPanel.'');
                 }else{
                $extraDAO->insertIP($ip);
                header('location: '.config::$loginError.'');
                 } 

                }


}

/** Sirve para cambiar la contraseña del usuario de la sessión
 *
 */
if(isset($_POST['cambiarPassword'])){

$administradorDAO = new administradorDAO();
$administrador = new administrador();
$tecnicoDAO = new tecnicoDAO();
$tecnico = new tecnico();

       $user = $_POST['User'];
       $pass = $_POST['Password'];
       $Npass = $_POST['nuevoPassword'];

if(!empty($user) && !empty($pass) && !empty($Npass)){

 
                if($administradorDAO->buscarAdministrador($user)->getContrasena() == md5($pass)){
$administrador = $administradorDAO->buscarAdministrador($user);
$administrador->setContrasena(md5($Npass));
$administradorDAO ->modificarAdministrador($administrador);
header('location: /electrotel/password.php?done=done');
                }else if($tecnicoDAO->buscarTecnico($user)->getContrasena() == md5($pass)){
                    $tecnico = $tecnicoDAO->buscarTecnico($user);
$tecnico->setContrasena(md5($Npass));
$tecnicoDAO ->modificarTecnico($tecnico);
header('location: /electrotel/password.php?done=done');
                }else{
header('location: /electrotel/password.php?error=invalidpassword');
                }



}else{
header('location: /electrotel/password.php?error=critical');   
}

}


?>
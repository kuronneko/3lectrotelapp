<?php
//insert.php
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;

require config::$administradorDAO_url;
require config::$tecnicoDAO_url;
require config::$administrador_url;
require config::$tecnico_url;

/** Controlador ajax para el registro, modificación y eliminación de usuarios de tipo administrador o técnico
 *  El controlador se inicializa a través de un script de jquery utilizando las librerias de ajax
 */
$interruptor = "";

$administradorDAO = new administradorDAO();
$administrador = new administrador();
$tecnicoDAO = new tecnicoDAO();
$tecnico = new tecnico();


if(!empty($_POST["deleteAdmin"])){
    $interruptor = "Admin";

$administrador = $administradorDAO->buscarAdministrador($_POST["deleteAdmin"]);
$administradorDAO ->eliminarAdministrador($administrador);
            }
                        if(!empty($_POST["deleteTecnico"])){
                            $interruptor = "Tecnico";
             
             $tecnico = $tecnicoDAO->buscarTecnico($_POST["deleteTecnico"]);
             $tecnicoDAO ->eliminarTecnico($tecnico);
            }
if(!empty($_POST['AccType'])){
if($_POST['AccType'] == 'Administrador'){
$interruptor = "Admin";
$administrador->setId($_POST['id']);
$administrador->setNombre($_POST['nombre']);
$administrador->setApellido($_POST['apellido']);
$administrador->setEmail($_POST['email']);
                if($administradorDAO->buscarAdministrador($_POST['id'])->getContrasena() != ($_POST['contrasena'])){
$administrador->setContrasena(md5($_POST['contrasena']));
                }else{
$administrador->setContrasena($administradorDAO->buscarAdministrador($_POST['id'])->getContrasena());         
                }
$administrador->setAccType($_POST['AccType']);
$administrador->setEdad($_POST['edad']);
$administrador->setDomicilio($_POST['domicilio']);

            if($administradorDAO->buscarAdministrador($_POST['id'])->getId() == $_POST['id']){
            $administradorDAO ->modificarAdministrador($administrador);
            }else{
            $administradorDAO ->registrarAdministrador($administrador);
            }


    }else if($_POST['AccType'] == 'Tecnico'){

        $interruptor = "Tecnico";
$tecnico->setId($_POST['id']);
$tecnico->setNombre($_POST['nombre']);
$tecnico->setApellido($_POST['apellido']);
$tecnico->setEmail($_POST['email']);
                if($tecnicoDAO->buscarTecnico($_POST['id'])->getContrasena() != ($_POST['contrasena'])){
$tecnico->setContrasena(md5($_POST['contrasena']));
                }else{
$tecnico->setContrasena($tecnicoDAO->buscarTecnico($_POST['id'])->getContrasena());         
                }
$tecnico->setAccType($_POST['AccType']);
$tecnico->setEdad($_POST['edad']);
$tecnico->setDomicilio($_POST['domicilio']);

            if($tecnicoDAO->buscarTecnico($_POST['id'])->getId() == $_POST['id']){
            $tecnicoDAO ->modificarTecnico($tecnico);
            }else{
            $tecnicoDAO ->registrarTecnico($tecnico);
            }


    }
}   


$response = "";
if($interruptor == "Admin"){
  
$response .= "<table class='table'>";
;
    $response .=  "<tbody id='myTable'>";
        foreach ($administradorDAO ->listarAdministradores() as $admin) {
        
        $response .=  "<tr>";
            $response .=   "<td>".$admin->getId()."</td>";
            $response .=   "<td>".$admin->getNombre()."</td>";
            $response .=   "<td>".$admin->getApellido()."</td>";
            $response .=   "<td>".$admin->getEmail()."</td>";
            $response .=   "<td>".$admin->getContrasena()."</td>";
            $response .=   "<td>".$admin->getAccType()."</td>";
            $response .=   "<td>".$admin->getEdad()."</td>";
            $response .=   "<td>".$admin->getDomicilio()."</td>";
                    $response .=   "<td>"."<div class='btn-group'>"."<a href='#' name='edit' value='Edit' class='btn btn-primary edit_data_admin' id='".$admin->getId()."'>Editar</a>"."<a  href='#' name='delete' value='Delete' class='btn btn-primary delete_data_admin' id='".$admin->getId()."'>Eliminar</a>"."</div>"."</td>"; 
        $response .= "</tr>";
        
        }
    $response .=  "</tbody>";
$response .= "</table>";

echo $response;
exit;
}else{

$response .= "<table class='table'>";
;
    $response .=  "<tbody id='myTable'>";
        foreach ($tecnicoDAO ->listarTecnicos() as $tecnico) {
        
        $response .=  "<tr>";
            $response .=   "<td>".$tecnico->getId()."</td>";
            $response .=   "<td>".$tecnico->getNombre()."</td>";
            $response .=   "<td>".$tecnico->getApellido()."</td>";
            $response .=   "<td>".$tecnico->getEmail()."</td>";
            $response .=   "<td>".$tecnico->getContrasena()."</td>";
            $response .=   "<td>".$tecnico->getAccType()."</td>";
            $response .=   "<td>".$tecnico->getEdad()."</td>";
            $response .=   "<td>".$tecnico->getDomicilio()."</td>";
                    $response .=   "<td>"."<div class='btn-group'>"."<a href='#' name='edit' value='Edit' class='btn btn-primary edit_data_tecnico' id='".$tecnico->getId()."'>Editar</a>"."<a  href='#' name='delete' value='Delete' class='btn btn-primary delete_data_tecnico' id='".$tecnico->getId()."'>Eliminar</a>"."</div>"."</td>"; 
        $response .= "</tr>";
        
        }
    $response .=  "</tbody>";
$response .= "</table>";

echo $response;
exit;
}










?>
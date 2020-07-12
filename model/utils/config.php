<?php


/** Sirve para establecer las rutas de acceso a información fisica en el servidor
 * Class config
 */
class config{

    static $nav = '/xampp/htdocs/electrotel/navbar.php';    //nav location
    static $footer = '/xampp/htdocs/electrotel/footer.php'; //footer location

    static $conexion_url = '/xampp/htdocs/electrotel/model/utils/conexion.php';//conexion php file url

    static $administrador_url = '/xampp/htdocs/electrotel/model/dto/administrador.php';//administrador class php file url
    static $tecnico_url = '/xampp/htdocs/electrotel/model/dto/tecnico.php';//administrador class php file url
    static $categoria_url = '/xampp/htdocs/electrotel/model/dto/categoria.php';
static $localizacion_url = '/xampp/htdocs/electrotel/model/dto/localizacion.php';
static $labor_url = '/xampp/htdocs/electrotel/model/dto/labor.php';
static $item_url = '/xampp/htdocs/electrotel/model/dto/item.php';
static $reporte_url = '/xampp/htdocs/electrotel/model/dto/reporte.php';
static $incluye_url = '/xampp/htdocs/electrotel/model/dto/incluye.php';

    static $administradorDAO_url = '/xampp/htdocs/electrotel/model/dao/administradorDAO.php';//usuarioDAO php file url
    static $tecnicoDAO_url = '/xampp/htdocs/electrotel/model/dao/tecnicoDAO.php';//usuarioDAO php file url
    static $categoriaDAO_url = '/xampp/htdocs/electrotel/model/dao/categoriaDAO.php';//usuarioDAO php file url
    static $localizacionDAO_url = '/xampp/htdocs/electrotel/model/dao/localizacionDAO.php';//usuarioDAO php file url
    static $laborDAO_url = '/xampp/htdocs/electrotel/model/dao/laborDAO.php';//usuarioDAO php file url
    static $itemDAO_url = '/xampp/htdocs/electrotel/model/dao/itemDAO.php';
    static $reporteDAO_url = '/xampp/htdocs/electrotel/model/dao/reporteDAO.php'; 
    static $incluyeDAO_url = '/xampp/htdocs/electrotel/model/dao/incluyeDAO.php';
    static $extraDAO = '/xampp/htdocs/electrotel/model/dao/extraDAO.php'; 

    static $session = '93ngeNKlFCRCdXiHKRYmEzAmJggdTYZjJ2';
    static $loginError = '/electrotel/index.php?error=error';
    static $loginattempts = '/electrotel/index.php?error=attempts';            //admin session
    static $loginattemptsQuantity = 30;
    static $adminPanel = '/electrotel/panelAdministrador.php';
    static $tecnicoPanel = '/electrotel/panelTecnico.php';  //index.php gallery location
    static $index = '/electrotel/index.php';
}

?>
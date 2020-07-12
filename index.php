<?php
include("/xampp/htdocs/electrotel/model/utils/config.php");

require config::$conexion_url;
require config::$administrador_url;
require config::$administradorDAO_url;
require config::$tecnico_url;
require config::$tecnicoDAO_url;


?>
<!DOCTYPE html>
<html>
  <head>
        <title>ELECTROTEL</title>
         <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link id="pagestyle" rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>
  <body>
    <div>

      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
          
          <div>
            
            <div class="row">
              <div class="col-sm-3">
              </div>
              <div class="col-sm-6" style="padding: 25px;">
                <div class="container-fluid loginBox" style="border-radius: 0px; padding-left: 30px; padding-right: 30px; padding-top: 50px; padding-bottom: 50px;">
                  <div align="center">
                    <h1>Inicio de sesión</h1>
                   <br>
                    <img class="img-responsive" style="width: 100%;filter: invert(0%)" src="css/Untitled.png">
                  </div>
                  <br>
                  
                    <?php
                    if(!empty($_GET['error'])){
                    if($_GET['error'] == 'error'){
                      echo "<div class='text-center'>";
                    echo "<span class='error'><p>¡Usuario o contraseña incorrectos!</p></span>";
                    echo "</div>";
                    }else if($_GET['error'] == 'attempts'){
                    echo "<div class='text-center'>";
                    echo "<span class='contentTextWarning'><p>!Se te ha denegado el acceso por exceder el limite de intentos fallidos¡ Debes inténtarlo nuevamente en 30 minutos</p></span>";
                    echo "</div>";
                    }
                    }

                    ?>

                    <?php
                  session_start();
                  $administradorDAO = new administradorDAO();
                  $tecnicoDAO = new tecnicoDAO();
                  if(empty($_SESSION[config::$session])){
                                         echo "<form action='controller/login.php' method='POST'>";
                    echo "<div class='form-group'>";
                      
                      echo "<input style='border-radius: 0px' type='User' class='form-control' id='User' placeholder='Correo electrónico' name='User'>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                      
                      echo "<input style='border-radius: 0px' type='Password' class='form-control' id='Password' placeholder='Contraseña' name='Password'>";
                    echo "</div>";
                    echo "<button type='submit' class='btn btn-primary' style='width: 100%' name='Login'>Entrar</button>";
                  echo "</form>";
                  }else if(!empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){

                    echo "<p>Usuario: ".$administradorDAO->buscarAdministrador($_SESSION[config::$session])->getNombre()."|".$administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId()."</p>";
                    echo "<p>Tipo: ".$administradorDAO->buscarAdministrador($_SESSION[config::$session])->getAccType()."</p>";
                    echo "<a href='panelAdministrador.php' class='btn btn-primary' role='button' style='width: 100%;'>Ir al Panel</a>";
                    echo "<br>";echo "<br>";
                    echo "<a href='controller/login.php?Logout' class='btn btn-primary' role='button' style='width: 100%;'>Salir</a>";
                             
                  }else if (!empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId())){
                    echo "<p>Usuario: ".$tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getNombre()."|".$tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId()."</p>";
                    echo "<p>Tipo: ".$tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getAccType()."</p>";
                    echo "<a href='panelTecnico.php' class='btn btn-primary' role='button' style='width: 100%;'>Ir al Panel</a>";
                    echo "<br>";echo "<br>";
                    echo "<a href='controller/login.php?Logout' class='btn btn-primary' role='button' style='width: 100%;'>Salir</a>";
                  }

                    ?>
                    <br>  
                    <?php
                     if(!empty($_SESSION[config::$session])){

                     }else{
                    echo "<div><span class='contentTextWarning'>Advertencia:</span>&nbsp;<span class='contentText'>Si intenta iniciar seisón repetidamente con credenciales no validas, su IP será automáticamente bloqueada (Más detalles en soporte)</span></div>";
                     }
                    ?>
                    
                        
                </div>

              </div>
              <div class="col-sm-3">
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
        </div>
      </div>
      <div><?php include config::$footer?></div>
    </div>
    
  </body>
</html>
<?php session_start();
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;
require config::$administrador_url;
require config::$administradorDAO_url;
require config::$tecnico_url;
require config::$tecnicoDAO_url;

                  
                  $administradorDAO = new administradorDAO();
                  $tecnicoDAO = new tecnicoDAO();
               
if(empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId()) && empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
header('location: '.config::$index.'');
}else{

}
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
      <div><?php include config::$nav?></div>
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
                    <br>
                    <h1>Opciones de contraseña</h1>
                    <br>
                    
                  </div>
                  <br>
                  
                  <?php
                  if(!empty($_GET['error'])){
                  if($_GET['error'] == 'invalidpassword'){
                echo "<div class='text-center'>";
                    echo "<span class='contentTextWarning'><p>La contraseña que ingresaste no coincide con la del usuario de la sesión</p></span>";
                  echo "</div>";
                  }else if($_GET['error'] == 'critical'){
                  echo "<div class='text-center'>";
                    echo "<span class='contentTextWarning'><p>¡Todos los parámetros deben estar completos!</p></span>";
                  echo "</div>";
                  }
                  }
                  if(!empty($_GET['done'])){
                    if($_GET['done'] == 'done'){
                  echo "<div class='text-center'>";
                    echo "<span class='contentTextWarning'><p>¡Tu contraseña ha sido cambiada con éxito!</p></span>";
                  echo "</div>";
                  }
                  }
                  ?>
                  <?php

                  if(empty($_SESSION[config::$session])){
                  
                  
                  }else if(!empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
                  
                  echo "<form action='controller/login.php' method='POST'>";
                    echo "<div class='form-group'>";
                   
                      echo "<input style='border-radius: 0px' type='User' class='form-control' id='User' placeholder='Correo electrónico' name='User' value='".$administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId()."' readonly>";
                    echo "</div>";

                    echo "<div class='form-group'>";
                      
                      echo "<input style='border-radius: 0px' type='Password' class='form-control' id='Password' placeholder='Actual contraseña' name='Password'>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                      
                      echo "<input style='border-radius: 0px' type='Password' class='form-control' id='nuevoPassword' placeholder='Nueva contraseña' name='nuevoPassword'>";
                    echo "</div>";
                    echo "<button type='submit' class='btn btn-primary' style='width: 100%'' name='cambiarPassword'>Guardar Cambios</button>";
                    
                  echo "</form>";
                  
                  }else if (!empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId())){
                  echo "<form action='controller/login.php' method='POST'>";
                    echo "<div class='form-group'>";
                   
                      echo "<input style='border-radius: 0px' type='User' class='form-control' id='User' placeholder='Correo electrónico' name='User' value='".$tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId()."' readonly>";
                    echo "</div>";

                    echo "<div class='form-group'>";
                      
                      echo "<input style='border-radius: 0px' type='Password' class='form-control' id='Password' placeholder='Actual contraseña' name='Password'>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                      
                      echo "<input style='border-radius: 0px' type='Password' class='form-control' id='nuevoPassword' placeholder='Nueva contraseña' name='nuevoPassword'>";
                    echo "</div>";
                    echo "<button type='submit' class='btn btn-primary' style='width: 100%'' name='cambiarPassword'>Guardar Cambios</button>";
                    
                  echo "</form>";
                  }
                  ?>
                  <br>
                  <?php
                  if(!empty($_SESSION[config::$session])){
echo "<div><span class='contentTextWarning'>Aviso:</span>&nbsp;<span class='contentText'>Se debe ingresar correctamente los parámetros requeridos (Más detalles en soporte)</span></div>";
                  }else{
                  
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
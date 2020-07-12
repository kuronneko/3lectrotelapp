<!DOCTYPE html>
<?php
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;
require config::$tecnico_url;
require config::$tecnicoDAO_url;
require config::$administrador_url;
require config::$administradorDAO_url;
                  session_start();
                  $administradorDAO = new administradorDAO();
               
                  if(empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
                     header('location: '.config::$index.'');
                  }else{
                    
                  }
?>
<html>
	<head>
		<title>ELECTROTEL</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link id="pagestyle" rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script>
    $(document).ready(function(){
      setTimeout(function() {
  $(".loadingBar").hide();
  $(".panel").show(); //grid is hidden by css
      }, Math.floor((Math.random() * 500) + 250));
    });

    
    </script>
	</head>
	<body>
		<div>


			<div><?php include config::$nav?></div>


  <!-- The Modal -->
  <div class="modal fade" id="myModal">
  	<br><br>
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-1-1-1">
          <h4 class="modal-title">Seleccione tipo de usuario</h4><i class="close fas fa-times iconstyle" data-dismiss="modal"></i>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body bg-1-1-1">
          <a href="gestionUsuarios.php?usuario=admin" class="btn btn-primary">Administrador</a><a href="gestionUsuarios.php?usuario=tecnico" class="btn btn-primary">Técnico</a>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer bg-1-1-1">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
                               <div class="text-center loadingBar">
                              <br><br><br><br><br>
             <div class="spinner-border loadingIcon"></div>
             <br><br>
             <p class="text-center message">Cargando componentes...</p>
           </div>
			<div class="row">

				<div class="col-sm-2">
				</div>
				<div class="col-sm-8 panel">
					<br><br><br><br>
					<h1 class="text-center">Panel de administrador</h1>
					<p class="message" id="userState" name="userState"></p>
					<div>
					
						<div class="row">
							<div class="col-sm-4">
																<br>
<div class="bg-1-1-1">
  <div class="card">
    <div class="card-body" style="padding: 0px"> 
          <div class="header-panel">
    	<h4 class="card-title" style="padding: 5px;">Contraseña<i class="float-right fas fa-key iconstyle"></i></h4>
    </div>
      <p class="card-text" style="padding: 5px; height: 52px;">Opción para cambiar la contraseña del usuario de la sesión.</p>
      <a href="password.php" class="btn btn-primary btn-sm stretched-link float-right">Entrar</a>
    </div>
  </div>
</div>
								<br>
<div class="bg-1-1-1">
  <div class="card">
    <div class="card-body" style="padding: 0px"> 
          <div class="header-panel">
      <h4 class="card-title" style="padding: 5px;">Opciones de items<i class="float-right fas fa-seedling iconstyle"></i></h4>
    </div>
      <p class="card-text" style="padding: 5px; height: 52px;">Opción para gestionar los Items del sistema.</p>
      <a href="gestionItems.php" class="btn btn-primary btn-sm stretched-link float-right">Entrar</a>
    </div>
  </div>
</div>
								<br>
<div class="bg-1-1-1">
  <div class="card">
    <div class="card-body" style="padding: 0px"> 
          <div class="header-panel">
      <h4 class="card-title" style="padding: 5px;">Opciones de reportes<i class="float-right far fa-clone iconstyle"></i></h4>
    </div>
      <p class="card-text" style="padding: 5px; height: 52px;">Opción para gestionar los reportes recopilados en el sistema.</p>
      <a href="gestionReportes.php" class="btn btn-primary btn-sm stretched-link float-right">Entrar</a>
    </div>
  </div>
</div>
							</div>
							<div class="col-sm-4">
																<br>
<div class="bg-1-1-1">
  <div class="card">
    <div class="card-body" style="padding: 0px"> 
          <div class="header-panel">
      <h4 class="card-title" style="padding: 5px;">Opciones de estadísticas<i class="float-right far fa-chart-bar iconstyle"></i></h4>
    </div>
      <p class="card-text" style="padding: 5px; height: 52px;">Opción para visualizar las estadísticas generadas en el sistema.</p>
      <a href="gestionEstadisticas.php" class="btn btn-primary btn-sm stretched-link float-right">Entrar</a>
    </div>
  </div>
</div>
								<br>
<div class="bg-1-1-1">
  <div class="card">
    <div class="card-body" style="padding: 0px"> 
          <div class="header-panel">
      <h4 class="card-title" style="padding: 5px;">Opciones de usuarios<i class="float-right far fa-address-card iconstyle"></i></h4>
    </div>
      <p class="card-text" style="padding: 5px; height: 52px;">Opción para gestionar las cuentas de usuarios del sistema.</p>
      <a href="#" class="btn btn-primary btn-sm stretched-link float-right" data-toggle="modal" data-target="#myModal">Entrar</a>
    </div>
  </div>
</div>



								<br>
<div class="bg-1-1-1">
  <div class="card">
    <div class="card-body" style="padding: 0px"> 
          <div class="header-panel">
      <h4 class="card-title" style="padding: 5px;">Opciones de categorias<i class="float-right fas fa-boxes iconstyle"></i></h4>
    </div>
      <p class="card-text" style="padding: 5px; height: 52px;">Opción para gestionar las categorías del sistema.</p>
      <a href="gestionCategorias.php" class="btn btn-primary btn-sm stretched-link float-right">Entrar</a>
    </div>
  </div>
</div>
								
							</div>
							<div class="col-sm-4">
								<br>
<div class="bg-1-1-1">
  <div class="card">
    <div class="card-body" style="padding: 0px"> 
          <div class="header-panel">
      <h4 class="card-title" style="padding: 5px;">Opciones de localizaciones<i class="float-right far fa-map iconstyle"></i></h4>
    </div>
      <p class="card-text" style="padding: 5px; height: 52px;">Opción para gestionar las localizaciones.</p>
      <a href="gestionLocalizaciones.php" class="btn btn-primary btn-sm stretched-link float-right">Entrar</a>
    </div>
  </div>
</div>
								<br>
<div class="bg-1-1-1">
  <div class="card">
    <div class="card-body" style="padding: 0px"> 
          <div class="header-panel">
      <h4 class="card-title" style="padding: 5px;">Opciones de labores<i class="float-right fas fa-tools iconstyle"></i></h4>
    </div>
      <p class="card-text" style="padding: 5px; height: 52px;">Opción para gestionar las labores del sistema.</p>
      <a href="gestionLabores.php" class="btn btn-primary btn-sm stretched-link float-right">Entrar</a>
    </div>
  </div>
</div>

							</div>
						</div>
					</div>

				</div>
				<div class="col-sm-2">
				</div>
			</div>

			<div class="row"><!–– FOOTER FRAME ––>
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<div><?php include config::$footer?></div>
				</div>
				<div class="col-sm-2">
				</div>
			</div>
		</div>
	</body>
</html>
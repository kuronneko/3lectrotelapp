<!DOCTYPE html>
<?php
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;
require config::$administrador_url;
require config::$administradorDAO_url;
require config::$tecnicoDAO_url;
require config::$tecnico_url;


                  session_start();
                  $administradorDAO = new administradorDAO();
               
                  if(empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
                     header('location: '.config::$index.'');
                  }else{
                    
                  }
?>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		<link id="pagestyle" rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<script src="js/codigoJS.js"></script>
		<script src="plugins/code/highcharts.js"></script>
		<script src="plugins/code/modules/exporting.js"></script>
		<script src="plugins/code/modules/export-data.js"></script>
		<script src="plugins/code/modules/drilldown.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>

		<div>
			<div><?php include config::$nav?></div>
			<div class="row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<br><br><br><br>
					<h1 class="text-center">Gestión de estadísticas</h1>
					<br>
						<div class="btn-grup" role="group" aria-label="">
		
		<button id="btnBD" type="button" class="btn btn-primary">[T]Items</button>
		<button id="btnBDLabores" type="button" class="btn btn-primary">[T]Labores</button>
		<button id="btnBDlocalizaciones" type="button" class="btn btn-primary">[T]Localizaciones</button>
	</div> 
	<div class="row">
		<div class="col-sm-3">
			<span class="contentTextWarning">Items</span>
														      <select class="form-control" id="dateItem" name="dateItem">
       <?php
       echo "<option>Seleccione fecha</option>";
         for ($i = 0; $i <= 12; ++$i) {
    $time = strtotime(sprintf('-%d months', $i));
    $value = date('Y-m-d', $time);
    $label = date('F Y', $time);
     echo "<option>".$value."</option>";
}

       ?>
      </select>
		</div>
		<div class="col-sm-3">
			<span class="contentTextWarning">Labores</span>
											      <select class="form-control" id="dateLabor" name="dateLabor">
       <?php
       echo "<option>Seleccione fecha</option>";
         for ($i = 0; $i <= 12; ++$i) {
    $time = strtotime(sprintf('-%d months', $i));
    $value = date('Y-m-d', $time);
    $label = date('F Y', $time);
     echo "<option>".$value."</option>";
}

       ?>
      </select>
		</div>
				<div class="col-sm-3">
					<span class="contentTextWarning">Localizaciones</span>
														      <select class="form-control" id="dateLocalizacion" name="dateLocalizacion">
       <?php
       echo "<option>Seleccione fecha</option>";
         for ($i = 0; $i <= 12; ++$i) {
    $time = strtotime(sprintf('-%d months', $i));
    $value = date('Y-m-d', $time);
    $label = date('F Y', $time);
     echo "<option>".$value."</option>";
}

       ?>
      </select>
		</div>
						<div class="col-sm-3">
					<span class="contentTextWarning">Precios</span>
														      <select class="form-control" id="datePrecios" name="datePrecios">
       <?php
       echo "<option>Seleccione fecha</option>";
         for ($i = 0; $i <= 12; ++$i) {
    $time = strtotime(sprintf('-%d months', $i));
    $value = date('Y-m-d', $time);
    $label = date('F Y', $time);
     echo "<option>".$value."</option>";
}

       ?>
      </select>
		</div>
	</div>
			<div><span class="contentTextWarning">Importante:</span>&nbsp;<span class="contentText">Las gráficas están segmentadas por mes en un intervalo de 30 días previos a partir de la fecha seleccionada (Mas detalles en soporte)</span></div>
					<p class="message" id="userState" name="userState"></p>
					<div class="container-fluid bg-1-1-1" style="padding-left: 0px;padding-right: 0px;">
						<div class="row">

							<div class="col-sm-12">
								
	<div id="contenedor" style="min-width: 320px; height: 400px; margin: 0 auto"></div>

						<div id="modal-1" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header bg-1-1-1">
									<h4 class="modal-title">Estadísticas ELECTROTEL</h4><i class="close fas fa-times iconstyle" data-dismiss="modal"></i>
								</div>
								<div class="modal-body bg-1-1-1" id="modalView">
			   <div id="contenedor-modal" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
								</div>
								<div class="modal-footer bg-1-1-1">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
								</div>
							</div>
						</div>
					</div>
							</div>
						</div>
					</div>
					<hr>
						<div><span class="contentTextWarning">Aviso:</span>&nbsp;<span class="contentText">Las gráficas generadas son una fiel representación de la información almacenada en la base de datos (Mas detalles en soporte)</span></div>
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
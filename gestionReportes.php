<?php session_start();
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;

require config::$itemDAO_url;
require config::$categoriaDAO_url;
require config::$administradorDAO_url;
require config::$tecnicoDAO_url;
require config::$localizacionDAO_url;
require config::$laborDAO_url;
require config::$reporteDAO_url;
require config::$incluyeDAO_url;

require config::$item_url;
require config::$administrador_url;
require config::$categoria_url;
require config::$tecnico_url;
require config::$localizacion_url;
require config::$labor_url;
require config::$reporte_url;
require config::$incluye_url;

   
   
$tecnicoDAO = new tecnicoDAO();
$administradorDAO = new administradorDAO();

if(empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId()) && empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
header('location: '.config::$index.'');
}else{

}

?>
<!DOCTYPE html>
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
			$(document).on('click', '.delete_data', function(){
		var deleteUser = $(this).attr("id");
		$.ajax({
		url:"controller/ajaxReporteDeleteController.php",
		method:"POST",
		data:{deleteUser:deleteUser},
		           beforeSend:function(){
                   $("#userState").text("Eliminando...");
                },
		success:function(data){
			setTimeout(function() {
		$('#myTable').html(data);
		$('#userState').text("¡Operación realizada con éxito!");
		  }, 1000);
		}
		});
		});
});
		
		</script>
				<script>
		$(document).ready(function(){
		$("#search-criteria").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$(".reporte").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
		});
		});
		</script>
	</head>
	<body>
		<div>
			<div><?php include config::$nav?></div>
			<div class="row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<br><br><br><br>
					<?php
if(!empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId())){
echo "<h1 class='text-center'>Mis de reportes</h1>";
}else if (!empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
echo "<h1 class='text-center'>Historial de reportes</h1>";
}

					?>
					
					<br>
					<p class="message" id="userState" name="userState"></p>
					<div class="container-fluid bg-1-1-1" style="padding-left: 0px;padding-right: 0px;">

						<div class="row">
							<div class="col-sm-12">
							<input class='form-control' id='search-criteria' type="text" placeholder='Buscar...'>	
								<?php
								
    $reporteDAO = new reporteDAO();
    $incluyeDAO = new incluyeDAO();

echo "<div class='' id='myTable'>";
if(!empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId())){

	foreach($reporteDAO ->listarMisReportes($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId()) as $reportes){

  echo "<div class='reporte'>";
    echo "<div class='card'>";
      echo "<div class='card-header'>";
        echo "<a class='card-link' data-toggle='collapse' href='#".$reportes->getId()."'>";
          echo "<p>Reporte ID: ".$reportes->getId()." <i class='float-right far fa-file-alt iconstyle'></i></p>";
        echo "</a>";
      echo "</div>";
      echo "<div id='".$reportes->getId()."' class='collapse'>";
        echo "<div class='card-body'>";
        echo "<div><span class='contentTextWarning2'>Nombre Técnico:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getTecnico()->getNombre()."</span></div>";
                echo "<div><span class='contentTextWarning2'>Fecha:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getFecha()."</span></div>";
echo "<div><span class='contentTextWarning2'>Localización:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getLocalizacion()->getNombre()."</span></div>";
 echo "<div><span class='contentTextWarning2'>Labor:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getLabor()->getNombre()."</span></div>"; 
echo "<div><span class='contentTextWarning2'>Comentario:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getComentario()."</span></div>"; 
      echo "<hr>";
foreach($incluyeDAO ->listarMisItems($reportes->getId()) as $items){
	echo "<div><span class='contentTextWarning2'>".$items->getItem()->getId().":</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$items->getItem()->getNombre()." ".$items->getCantidad()."</span></div>";
}
        echo "</div>";

      echo "</div>";

    echo "</div>";

echo "</div>";

	}

}else if(!empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){

	foreach($reporteDAO ->listarTodosLosReportes() as $reportes){


  echo "<div class='reporte'>";
    echo "<div class='card'>";
      echo "<div class='card-header'>";
        echo "<a class='card-link' data-toggle='collapse' href='#".$reportes->getId()."'>";
          echo "<p>Reporte ID: ".$reportes->getId()." <i class='float-right far fa-file-alt iconstyle'></i></p>";
        echo "</a>";
      echo "</div>";
      echo "<div id='".$reportes->getId()."' class='collapse'>";
        echo "<div class='card-body'>";
        echo "<div><span class='contentTextWarning2'>Nombre Técnico:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getTecnico()->getNombre()."</span></div>";
                echo "<div><span class='contentTextWarning2'>Fecha:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getFecha()."</span></div>";
echo "<div><span class='contentTextWarning2'>Localización:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getLocalizacion()->getNombre()."</span></div>";
 echo "<div><span class='contentTextWarning2'>Labor:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getLabor()->getNombre()."</span></div>"; 
echo "<div><span class='contentTextWarning2'>Comentario:</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$reportes->getComentario()."</span></div>"; 
      echo "<hr>";
foreach($incluyeDAO ->listarMisItems($reportes->getId()) as $items){
	echo "<div><span class='contentTextWarning2'>".$items->getItem()->getId().":</span>&nbsp;<span class='contentText2' id='reporteIdx'>".$items->getItem()->getNombre()." ".$items->getCantidad()."</span></div>";
}
echo "<hr>";
echo "<a  href='#' name='idReporte' value='idReporte' class='btn btn-primary btn-sm delete_data' id='".$reportes->getId()."'>Eliminar reporte</a>";
        echo "</div>";

      echo "</div>";

    echo "</div>";

echo "</div>";

	}

}
echo "</div>";


 
								
								?>
							</div>
							<div class="col-sm-0">
								
								<!–– RIGHT DIV ––>
								
							</div>
						</div>
					</div>
										<?php
if(!empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId())){
	echo "<hr>";
						echo "<div><span class='contentTextWarning'>Aviso:</span>&nbsp;<span class='contentText'>Historial de reportes asociados al usuario de la sesión (Mas detalles en soporte)</span></div>";
}else if (!empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
					echo "<hr>";
						echo "<div><span class='contentTextWarning'>Advertencia:</span>&nbsp;<span class='contentText'>Eliminar un reporte podría afectar a otros elementos del sistema (Mas detalles en soporte)</span></div>";
}

					?>

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
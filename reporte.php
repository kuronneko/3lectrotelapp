<?php session_start();
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;
require config::$itemDAO_url;
require config::$categoriaDAO_url;
require config::$administradorDAO_url;
require config::$tecnicoDAO_url;
require config::$localizacionDAO_url;
require config::$laborDAO_url;
require config::$item_url;
require config::$administrador_url;
require config::$categoria_url;
require config::$tecnico_url;
require config::$localizacion_url;
require config::$labor_url;

$tecnicoDAO = new tecnicoDAO();

if(empty($tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId())){
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
		$("#search-criteria").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$(".items").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
		})
		;		});
		</script>
		<script>
		$(document).ready(function(){
		$(document).on('click', '.agregar', function(){
		
		var idItem = $(this).attr("id");
		$.ajax({
		url:"controller/ajaxFormController.php",
		method:"POST",
		data:{idItem:idItem},
		beforeSend:function(){
		$("#nuevoUsuario").text("Agregando Item al formulario...");
		},
		success:function(data){
		setTimeout(function() {
		$('#myTable').html(data);
		$('#nuevoUsuario').text("¡Operación realizada con éxito!");
		location.reload();
		}, 1000);
		}
		});
		});
		});
		
		</script>
				<script>
		$(document).ready(function(){
		$(document).on('click', '.borrarForm', function(){
		
		var idItem = $(this).attr("id");
		$.ajax({
		url:"controller/ajaxFormController.php",
		method:"POST",
		data:{idItem:idItem},
		beforeSend:function(){
		$("#nuevoUsuario").text("Eliminando formulario de reporte...");
		},
		success:function(data){
		setTimeout(function() {
		$('#myTable').html(data);
		$('#userState').text("¡Operación realizada con éxito!");
		//location.reload();
		}, 2000);
		}
		});
		});
		});
		
		</script>
		<script>
			$(document).ready(function(){
		$('#nuevoUsuario').click(function(){
		$('#userState').text("");
		$('#formError').text("");
		$('#insert_form')[0].reset();
		var randLetter = String.fromCharCode(65 + Math.floor(Math.random() * 26));
		var uniqid = randLetter + Date.now();
		
var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '/' +
    (month<10 ? '0' : '') + month + '/' +
    (day<10 ? '0' : '') + day;

		$('#reporteId').val(uniqid); 
		$('#fecha').val(output);
		$('#reporteIdx').text(uniqid); 
		$('#fechax').text(output);
		$('#formularioReportes').text("Formulario de reportes: "+uniqid);
		});
		$('#insert_form').on("submit", function(event){
		event.preventDefault();
		if(($('#id').val() == "") || ($('#nombre').val() == ""))  {
		nameError = "Debes completar todos los campos";
		document.getElementById("formError").innerHTML = nameError;
		}else{
		$("#insert").attr("disabled", true);
		var data = new FormData(this);
		$.ajax({
		url:"controller/ajaxReporteController.php",
		method:"POST",
		data: new FormData( this ),
		processData: false,
		contentType: false,
		beforeSend:function(){
		$('#insert').text("Sending...");
		},
		success:function(data){
		setTimeout(function() {
		$('#insert_form')[0].reset();
		$('#add_data_Modal').modal('hide');
		$('#myTable').html(data);
		$('#insert').text("Guardar");
		$('#formError').text("");
		$('#userState').text("¡Operación realizada con éxito!");
		$("#insert").attr("disabled", false)
		}, 1000);
		}
		});
		}
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
					<br><br><br>
					<div id='myTable'>
						<div class="text-center">
						<?php
						if(!empty($_SESSION['formItemList'])){
						echo "<a  href='#' name='nuevoUsuario' value='form' class='btn btn-primary btn-sm' id='nuevoUsuario' data-toggle='modal' data-target='#add_data_Modal' style='width: 100%'>"."Ir al formulario de reporte (".count($_SESSION['formItemList']).")"."</a>";
						 						echo "<a  href='#' name='deleteForm' value='deleteForm' class='btn btn-outline-danger btn-sm borrarForm' id='deleteForm'>Deshacer reporte</a>";
						}
						?>
                        </div>
						<br>
						<h1 class="text-center">Generador de reportes</h1>
						<br>
						<p class="message" id="userState" name="userState"></p>
						<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
							<input class='form-control' id='search-criteria' type="text" placeholder='Buscar...'>
							<div class="row">
								
								
								<?php
								
								$itemDAO = new itemDAO();
								
									
																		foreach ($itemDAO ->listarItems() as $item) {
																		echo "<div class='col-6 col-sm-2' >";
									echo "<div class='bg-1-1-1 items' style='width: 173px;'>";
										echo "<div class='card'>";
											echo   "<div class='card-body' style='padding: 0px'>";
												echo "<div class='header-panel text-center'>";
													echo "<h4 class='card-title' style='padding: 5px;'>".$item->getNombre()."</h4>";
												echo "</div>";
												echo  "<div class='text-center'>";
													echo  "<p class='card-text' style='padding: 5px;'>";
														echo "<i class='fas fa-seedling iconstyleItem'></i>";
													echo  "</p>";
												echo  "</div>";
												echo  "<div>";
													echo "<a  href='#' name='idItem' value='idItem' class='btn btn-primary btn-sm agregar' id='".$item->getId()."' style='width: 100%'>Agregar</a>";
												echo "</div>";
											echo "</div>";
										echo "</div>";
									echo "</div>";
												echo "</div>";
																}
								
								
								?>
								
							</div>
						</div>
					</div>
					<div id="add_data_Modal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-1-1-1">
									<h4 class="modal-title" id='formularioReportes'>Formulario de reporte</h4><i class="close fas fa-times iconstyle" data-dismiss="modal"></i>
								</div>
								<div class="modal-body bg-1-1-1" id="modalView">
									<span class="error"><p id="formError" name="formError"></p></span>
									<form method="post" id="insert_form" name="insert_form" enctype="multipart/form-data">
									   <input style="width: 100%; height: 25px;" type="hidden" name="fecha" id="fecha" class="disableInput form-control" value="" placeholder="ID" readonly/>
									    <input style="width: 100%; height: 25px;" type="hidden" name="reporteId" id="reporteId" class="disableInput form-control" value="" placeholder="ID" readonly/>
								<input style="width: 100%; height: 25px;" type="hidden" name="tecnicoId" id="tecnicoId" class="disableInput form-control" value="<?php echo $tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getId()?>" placeholder="ID" readonly/>
									
<div><span class="contentTextWarning2">Fecha:</span>&nbsp;<span class="contentText2" id='fechax'></span></div>
<div><span class="contentTextWarning2">Técnico de la sesión:</span>&nbsp;<span class="contentText2" id='tecniIdx'><?php echo $tecnicoDAO->buscarTecnico($_SESSION[config::$session])->getNombre()?></span></div>
<div><span class="contentTextWarning2">Reporte:</span>&nbsp;<span class="contentText2" id='reporteIdx'></span></div>

								<hr>
			
								
										<?php
										$laborDAO = new laborDAO();
										echo "<label>Labor:</label>";
												echo "<select name='laborId' id='laborId' class='form-control'>";
													foreach ($laborDAO ->listarLabores() as $labor) {
														echo "<option value='".$labor->getId()."'>".$labor->getNombre()."</option>";
													}
												echo "</select>";
												echo "<br>";
																			$localizacionDAO = new localizacionDAO();
										echo "<label>Localización:</label>";
												echo "<select name='localizacionId' id='localizacionId' class='form-control'>";
													foreach ($localizacionDAO ->listarLocalizaciones() as $localizacion) {
														echo "<option value='".$localizacion->getId()."'>".$localizacion->getNombre()."</option>";
													}
												echo "</select>";
												
										?>
										
										<hr>
										<?php
										$_SESSION["formItemList"] = unserialize(serialize($_SESSION["formItemList"]));
										if(!empty($_SESSION['formItemList'])){
										foreach ($_SESSION['formItemList'] as $items)
										{
											echo "<div>";
												echo "<span class='contentTextWarning2'>".$items->getId()."</span>|<span class='contentText2'>".$items->getNombre()."</span>|<span class='contentText2'>".$items->getCategoria()->getNombre()."</span>|<span class='contentText2'>".$items->getFabricante()."</span>";
											echo "</div>";
										}
										}
										?>
										<hr>
										<div class="form-group">
											<label for="comment">Comentario:</label>
											<textarea class="form-control" rows="3" id="comment" name="comment" placeholder="Escriba un comentario"></textarea>
										</div>
										
										<input type="submit" name="insert" id="insert" value="Enviar" class="btn btn-primary" style="width: 100%" />
									</form>
								</div>
								<div class="modal-footer bg-1-1-1">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div><span class="contentTextWarning">Aviso:</span>&nbsp;<span class="contentText">Se debe adjuntar un item al formulario de reporte a través del botón agregar</span></div>
					<div class="col-sm-2">
					</div>
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
<?php session_start();
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;
require config::$categoriaDAO_url;
require config::$categoria_url;
require config::$administrador_url;
require config::$administradorDAO_url;
require config::$tecnicoDAO_url;
require config::$tecnico_url;
                  

                  $administradorDAO = new administradorDAO();
                  

                  if(empty($administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId())){
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
		url:"controller/ajaxCategoriaController.php",
		method:"POST",
		data:{deleteUser:deleteUser},
		success:function(data){
		$('#myTable').html(data);
		$('#userState').text("¡Operación realizada con éxito!");
		}
		});
		});
		});
		
		</script>
		<script>
		$(document).ready(function(){
		$("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
		});
		});
		</script>
		<script>
			$(document).ready(function(){
				        $('#nuevoUsuario').click(function(){
				        	$('#formError').text("");
        	$('#insert_form')[0].reset();
var randLetter = String.fromCharCode(65 + Math.floor(Math.random() * 26));
var uniqid = randLetter + Date.now(); 
           
            $('#id').val(uniqid);
        	

           });  
		$('#insert_form').on("submit", function(event){
		event.preventDefault();
		if(($('#id').val() == "") || ($('#nombre').val() == ""))  {
		nameError = "¡Debes completar todos los campos!";
		document.getElementById("formError").innerHTML = nameError;
		}else{
		$("#insert").attr("disabled", true);
		var data = new FormData(this);
		$.ajax({
		url:"controller/ajaxCategoriaController.php",
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
					<br><br><br><br>
					<h1 class="text-center">Módulo gestión de Categorias</h1>
					<br>
					<p class="message" id="userState" name="userState"></p>
					<div class="container-fluid bg-1-1-1" style="padding-left: 0px;padding-right: 0px;">
						<button type="button" name="nuevoUsuario" id="nuevoUsuario" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Registrar nueva categoria</button>
						<div class="row">
							<div class="col-sm-12">
								
								<?php
								
								$categoriaDAO = new categoriaDAO();
						
									echo "<div class='container-fluid' style='padding-left: 0px;padding-right: 0px;'>";
										echo "<input class='form-control' id='myInput' type='text' placeholder='Buscar...''>";
											echo "<div class='table-responsive'>";
														echo "<table class='table'>";
																	echo "<thead>";
																				echo   "<tr>";
																							echo      "<th>ID</th>";
																							echo      "<th>Nombre</th>";
																							echo      "<th>Opciones</th>";
																				echo   "</tr>";
																	echo   "</thead>";
																	// output data of each row
																	echo  "<tbody id='myTable'>";
																		foreach ($categoriaDAO ->listarCategorias() as $categoria) {
																		
																				echo  "<tr>";
																							echo   "<td>".$categoria->getId()."</td>";
																							echo   "<td>".$categoria->getNombre()."</td>";

												                    echo   "<td>"."<div class='btn-group'>"."<a  href='#' name='delete' value='Delete' class='btn btn-primary delete_data' id='".$categoria->getId()."'>Eliminar</a>"."</div>"."</td>"; 
																				echo "</tr>";
																		
																										}
															echo  "</tbody>";
														echo "</table>";
											echo  "</div>";
								echo "</div>";
								
								?>
							</div>
							<div class="col-sm-0">
								
								<!–– RIGHT DIV ––>
								
							</div>
						</div>
					</div>
					<hr>
						<div><span class="contentTextWarning">Advertencia:</span>&nbsp;<span class="contentText">Eliminar una categoría podría afectar los resultados de ciertos elementos del sistema (Mas detalles en soporte)</span></div>
					<div id="add_data_Modal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-1-1-1">
									<h4 class="modal-title">Opciones de categoria</h4><i class="close fas fa-times iconstyle" data-dismiss="modal"></i>
								</div>
								<div class="modal-body bg-1-1-1" id="modalView">
									<span class="error"><p id="formError" name="formError"></p></span>
									<form method="post" id="insert_form" name="insert_form" enctype="multipart/form-data">
										<input type="text" name="id" id="id" class="form-control" value="" placeholder="ID" readonly/>
										<br/>
										<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre de la categoria" />
										<br>

										<input type="submit" name="insert" id="insert" value="Guardar" class="btn btn-primary" />
									</form>
								</div>
								<div class="modal-footer bg-1-1-1">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
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
<!DOCTYPE html>
<?php
include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;
require config::$administradorDAO_url;
require config::$tecnicoDAO_url;
require config::$administrador_url;
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
	    $(document).on('click', '.edit_data_admin', function(){
		$('#formError').text("");
		var idAdmin = $(this).attr("id");
		$.ajax({
		url:"controller/fetchUsuarios.php",
		method:"POST",
		data:{idAdmin:idAdmin},
		dataType:"json",
		success:function(data){
		$('#id').val(data.id);
		$('#nombre').val(data.nombre);
		$('#apellido').val(data.apellido);
		$('#email').val(data.email);
		$('#contrasena').val(data.contrasena);
		$('#AccType').val(data.AccType);
		$('#edad').val(data.edad);
		$('#domicilio').val(data.domicilio);
		$('#insert').text("Guardar");
		$('#add_data_Modal').modal('show');
		}
		});
		});
			    $(document).on('click', '.edit_data_tecnico', function(){
		$('#formError').text("");
		var idTecnico = $(this).attr("id");
		$.ajax({
		url:"controller/fetchUsuarios.php",
		method:"POST",
		data:{idTecnico:idTecnico},
		dataType:"json",
		success:function(data){
		$('#id').val(data.id);
		$('#nombre').val(data.nombre);
		$('#apellido').val(data.apellido);
		$('#email').val(data.email);
		$('#contrasena').val(data.contrasena);
		$('#AccType').val(data.AccType);
		$('#edad').val(data.edad);
		$('#domicilio').val(data.domicilio);
		$('#insert').text("Guardar");
		$('#add_data_Modal').modal('show');
		}
		});
		});
		});
		
		</script>
		<script>
		$(document).ready(function(){
			$(document).on('click', '.delete_data_admin', function(){
		var deleteAdmin = $(this).attr("id");
		$.ajax({
		url:"controller/ajaxUsuariosController.php",
		method:"POST",
		data:{deleteAdmin:deleteAdmin},
		success:function(data){
		$('#myTable').html(data);
		$('#userState').text("¡Operación realizada con éxito!");
		}
		});
		});
						$(document).on('click', '.delete_data_tecnico', function(){
		var deleteTecnico = $(this).attr("id");
		$.ajax({
		url:"controller/ajaxUsuariosController.php",
		method:"POST",
		data:{deleteTecnico:deleteTecnico},
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
			function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) {
            document.getElementById("formError1").innerHTML = "Correo electrónico no valido";
            return false;
        }else{
        document.getElementById("formError1").innerHTML = "";
        return true;
        }


}

function validateEdad(edad){
		    if(isNaN($('#edad').val())){
            document.getElementById("formError2").innerHTML = "Los parámetros ingresados como edad no son validos";
			}else{
				document.getElementById("formError2").innerHTML = "";
			}
}
		</script>
		<script>
			$(document).ready(function(){
        $('#nuevoUsuario').click(function(){
        	$('#insert_form')[0].reset();
        	$('#formError1').text("");$('#formError2').text("");$('#formError3').text("");
var randLetter = String.fromCharCode(65 + Math.floor(Math.random() * 26));
var uniqid = randLetter + Date.now(); 
           
            $('#id').val(uniqid);
        	
           });  
		$('#insert_form').on("submit", function(event){
		event.preventDefault();

		if(($('#id').val() == "") || ($('#nombre').val() == "") || ($('#apellido').val() == "") || ($('#email').val() == "") || ($('#contrasena').val() == "") || ($('#edad').val() == "") || ($('#domicilio').val() == "") || isNaN($('#edad').val()) )  {
			
            document.getElementById("formError3").innerHTML = "Debes completar todos los campos correctamente";
			
		}else{
		$("#insert").attr("disabled", true);
		var data = new FormData(this);
		$.ajax({
		url:"controller/ajaxUsuariosController.php",
		method:"POST",
		data: new FormData( this ),
		processData: false,
		contentType: false,
		beforeSend:function(){
		$('#insert').text("Sending...");
		$('#formError1').text("");$('#formError2').text("");$('#formError3').text("");
		},
		success:function(data){
		setTimeout(function() {
		$('#insert_form')[0].reset();
		$('#add_data_Modal').modal('hide');
		$('#myTable').html(data);
		$('#insert').text("Guardar");
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
					<?php
					if(!empty($_GET["usuario"])){
                    if($_GET["usuario"] == "admin"){
                    echo "<h1 class='text-center'>Módulo gestión de Usuarios [Administrador]</h1>";
                    }else if($_GET["usuario"] == "tecnico"){
echo "<h1 class='text-center'>Módulo gestión de Usuarios [Técnico]</h1>";
                    }
					}
					?>
					<br>
					<p class="message" id="userState" name="userState"></p>
					<div class="container-fluid bg-1-1-1" style="padding-left: 0px;padding-right: 0px;">
						<button type="button" name="nuevoUsuario" id="nuevoUsuario" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Registrar nuevo usuario</button>
						<div class="row">
							<div class="col-sm-12">
								
								<?php
								if(!empty($_GET["usuario"])){


								if($_GET["usuario"] == "admin"){
					
								$administradorDAO = new administradorDAO();
						
									echo "<div class='container-fluid' style='padding-left: 0px;padding-right: 0px;'>";
										echo "<input class='form-control' id='myInput' type='text' placeholder='Buscar...''>";
											echo "<div class='table-responsive'>";
														echo "<table class='table'>";
																	echo "<thead>";
																				echo   "<tr>";
																							echo      "<th>ID</th>";
																							echo      "<th>Nombre</th>";
																							echo      "<th>Apellido</th>";
																							echo      "<th>Email</th>";
																							echo      "<th>Contraseña</th>";
																							echo      "<th>Tipo</th>";
																							echo      "<th>Edad</th>";
																							echo      "<th>Domicilio</th>";
																							echo      "<th>Opciones</th>";
																				echo   "</tr>";
																	echo   "</thead>";
																	// output data of each row
																	echo  "<tbody id='myTable'>";
																		foreach ($administradorDAO ->listarAdministradores() as $admin) {
																		
																				echo  "<tr>";
																							echo   "<td>".$admin->getId()."</td>";
																							echo   "<td>".$admin->getNombre()."</td>";
																							echo   "<td>".$admin->getApellido()."</td>";
																						echo   "<td>".$admin->getEmail()."</td>";
																						echo   "<td>".$admin->getContrasena()."</td>";
																						echo   "<td>".$admin->getAccType()."</td>";
																						echo   "<td>".$admin->getEdad()."</td>";
																						echo   "<td>".$admin->getDomicilio()."</td>";
													echo   "<td>"."<div class='btn-group'>"."<a href='#' name='edit' value='Edit' class='btn btn-primary edit_data_admin' id='".$admin->getId()."'>Editar</a>"."<a  href='#' name='delete' value='Delete' class='btn btn-primary delete_data_admin' id='".$admin->getId()."'>Eliminar</a>"."</div>"."</td>";
																				echo "</tr>";
																		
																										}
															echo  "</tbody>";
														echo "</table>";
											echo  "</div>";
								echo "</div>";
								}else if($_GET["usuario"] == "tecnico"){
								
								$tecnicoDAO = new tecnicoDAO();

																	echo "<div class='container-fluid' style='padding-left: 0px;padding-right: 0px;'>";
										echo "<input class='form-control' id='myInput' type='text' placeholder='Buscar...''>";
											echo "<div class='table-responsive'>";
														echo "<table class='table'>";
																	echo "<thead>";
																				echo   "<tr>";
																							echo      "<th>ID</th>";
																							echo      "<th>Nombre</th>";
																							echo      "<th>Apellido</th>";
																							echo      "<th>Email</th>";
																							echo      "<th>Contraseña</th>";
																							echo      "<th>Tipo</th>";
																							echo      "<th>Edad</th>";
																							echo      "<th>Domicilio</th>";
																							echo      "<th>Opciones</th>";
																				echo   "</tr>";
																	echo   "</thead>";
																	// output data of each row
																	echo  "<tbody id='myTable'>";
																		foreach ($tecnicoDAO ->listarTecnicos() as $tecnico) {
																		
																				echo  "<tr>";
																							echo   "<td>".$tecnico->getId()."</td>";
																							echo   "<td>".$tecnico->getNombre()."</td>";
																							echo   "<td>".$tecnico->getApellido()."</td>";
																						echo   "<td>".$tecnico->getEmail()."</td>";
																						echo   "<td>".$tecnico->getContrasena()."</td>";
																						echo   "<td>".$tecnico->getAccType()."</td>";
																						echo   "<td>".$tecnico->getEdad()."</td>";
																						echo   "<td>".$tecnico->getDomicilio()."</td>";
													echo   "<td>"."<div class='btn-group'>"."<a href='#' name='edit' value='Edit' class='btn btn-primary edit_data_tecnico' id='".$tecnico->getId()."'>Editar</a>"."<a  href='#' name='delete' value='Delete' class='btn btn-primary delete_data_tecnico' id='".$tecnico->getId()."'>Eliminar</a>"."</div>"."</td>";
																				echo "</tr>";
																		
																										}
															echo  "</tbody>";
														echo "</table>";
											echo  "</div>";
								echo "</div>";
								}

								}
								?>
							</div>

							<div class="col-sm-0">
								
								<!–– RIGHT DIV ––>
								
							</div>

						</div>
					</div>
					<hr>
					<div><span class="contentTextWarning">Advertencia:</span>&nbsp;<span class="contentText">Eliminar un usuario podría afectar los resultados de ciertos elementos del sistema (Mas detalles en soporte)</span></div>
					
					<div id="add_data_Modal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-1-1-1">
									<h4 class="modal-title">Opciones de usuario</h4><i class="close fas fa-times iconstyle" data-dismiss="modal"></i>
								</div>
								<div class="modal-body bg-1-1-1" id="modalView">
									<span class="contentTextWarning"><p id="formError1" name="formError1"></p></span>
									<span class="contentTextWarning"><p id="formError2" name="formError2"></p></span>
									<span class="contentTextWarning"><p id="formError3" name="formError3"></p></span>
									<form method="post" id="insert_form" name="insert_form" enctype="multipart/form-data">
										<input type="text" name="id" id="id" class="form-control" value="" placeholder="ID" readonly/>
										<br/>
										<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre del usuario" />
										<br>
										<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese apellido del usuario" />
										<br>
										<input type="text" name="email" id="email" class="form-control" placeholder="Ingrese email del usuario" oninput="validateEmail(this);" />
										<br>
										<input type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese contraseña del usuario" />
										<br>
										<?php
										if($_GET["usuario"] == "admin"){
							    echo "<label>Tipo de usuario</label>";
										echo "<select name='AccType' id='AccType' class='form-control'>";
											echo "<option value='Administrador'>Administrador</option>";
										echo "</select>";
										}else{
							    echo "<label>Tipo de usuario</label>";
										echo "<select name='AccType' id='AccType' class='form-control'>";
											echo "<option value='Tecnico'>Tecnico</option>";
										echo "</select>";
										}
		
										?>
										<br>
										<input type="text" name="edad" id="edad" class="form-control" placeholder="Ingrese edad del usuario" oninput="validateEdad(this);"/>
										<br>
										<input type="text" name="domicilio" id="domicilio" class="form-control" placeholder="Ingrese domicilio del usuario" />
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
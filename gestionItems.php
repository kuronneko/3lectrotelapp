<!DOCTYPE html>
<?php

include("/xampp/htdocs/electrotel/model/utils/config.php");
require config::$conexion_url;

require config::$itemDAO_url;
require config::$categoriaDAO_url;
require config::$administradorDAO_url;
require config::$tecnicoDAO_url;

require config::$item_url;
require config::$administrador_url;
require config::$categoria_url;
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
	    $(document).on('click', '.edit_data', function(){
        $('#userState').text("");
		$('#formError').text("");
		var id = $(this).attr("id");
		$.ajax({
		url:"controller/fetchItems.php",
		method:"POST",
		data:{id:id},
		dataType:"json",
		success:function(data){
        $('#id').val(data.id);
        $('#nombre').val(data.nombre);
        $('#serie').val(data.serie);
        $('#precio').val(data.precio);
        $('#fabricante').val(data.fabricante);
        $('#idCategoria').val(data.idCategoria);
		$('#insert').text("Guardar");
		$('#add_data_Modal').modal('show');
		}
		});
		});
});

		</script>


		<script>
		$(document).ready(function(){
			$(document).on('click', '.delete_data', function(){
		var idDelete = $(this).attr("id");
		$.ajax({
		url:"controller/ajaxItemsController.php",
		method:"POST",
		data:{idDelete:idDelete},
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
		$(".items").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
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
           
            $('#id').val(uniqid);
        	

           });  
		$('#insert_form').on("submit", function(event){
		event.preventDefault();
		if(($('#id').val() == "") || ($('#nombre').val() == "") || isNaN($('#precio').val()) || ($('#serie').val() == "") || ($('#precio').val() == "") || ($('#fabricante').val() == ""))  {
			if(isNaN($('#precio').val())){
document.getElementById("formError").innerHTML = "Los parámetros ingresados como precio no son validos";
			}else{
document.getElementById("formError").innerHTML = "Debes completar todos los campos";
			}
		}else{
		$("#insert").attr("disabled", true);
		var data = new FormData(this);
		$.ajax({
		url:"controller/ajaxItemsController.php",
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
					<h1 class="text-center">Módulo gestión de Items</h1>
					<br>
					<p class="message" id="userState" name="userState"></p>
					<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
						<button type="button" name="nuevoUsuario" id="nuevoUsuario" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Registrar nuevo Item</button>
						<input class='form-control' id='search-criteria' type="text" placeholder='Buscar...'>
						<div class="row" id='myTable'>
							
								
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
   echo  "<div class='btn-group'>";
echo "<a href='#' name='edit' value='Edit' class='btn btn-primary btn-sm edit_data' id='".$item->getId()."'>Editar</a>";
echo "<a  href='#' name='delete' value='Delete' class='btn btn-primary btn-sm delete_data' id='".$item->getId()."'>Eliminar</a>";
echo "</div>";
      
    echo "</div>";
  echo "</div>";
echo "</div>";
echo "</div>";												

																}
						
							
								?>
						
						</div>

					</div>
					<hr>
						<div><span class="contentTextWarning">Advertencia:</span>&nbsp;<span class="contentText">Eliminar un item podría afectar los resultados de ciertos elementos del sistema (Mas detalles en soporte)</span></div>
					<div id="add_data_Modal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-1-1-1">
									<h4 class="modal-title">Opciones de item</h4><i class="close fas fa-times iconstyle" data-dismiss="modal"></i>
								</div>
								<div class="modal-body bg-1-1-1" id="modalView">
									<span class="contentTextWarning"><p id="formError" name="formError"></p></span>
									<form method="post" id="insert_form" name="insert_form" enctype="multipart/form-data">
										<label>Administrador</label>
											<input type="text" name="idAdmin" id="idAdmin" class="form-control" value="<?php echo $administradorDAO->buscarAdministrador($_SESSION[config::$session])->getId()?>" placeholder="ID" readonly/>
										<br/>

										<input type="text" name="id" id="id" class="form-control" value="" placeholder="ID" readonly/>
										<br/>
										<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre del item" />
										<br>
																				<input type="text" name="serie" id="serie" class="form-control" placeholder="Ingrese número de serie" />
										<br>
																				<input type="text" name="precio" id="precio" class="form-control" placeholder="Ingrese precio" />
										<br>
																				<input type="text" name="fabricante" id="fabricante" class="form-control" placeholder="Ingrese fabricante" />
										<br>
										<?php


								$categoriaDAO = new categoriaDAO();

							    echo "<label>Categoria</label>";
										echo "<select name='idCategoria' id='idCategoria' class='form-control'>";
										foreach ($categoriaDAO ->listarCategorias() as $categoria) {
											echo "<option value='".$categoria->getId()."'>".$categoria->getNombre()."</option>";
										}
										echo "</select>";
										
                                               ?>
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
 <?php include ('includes/conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Prueba PHP - Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--<link rel="stylesheet" type="text/css" href="css/style_login.css">-->
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" href="css/alertify.min.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" id="formulario">
					<span class="login100-form-title p-b-26">
						Registro
					</span>

					<div class="wrap-input100 validate-input" data-validate="Ingrese Tipo de Documento">
						<label for="tipo_documento">Tipo de Documento:</label>
						<select class="form-control" name="tipo_documento" id="tipo_documento" required>
							<option value="">Seleccione</option>
							<?php   
                                $lista = "SELECT * FROM sub_items WHERE item_id = 1";
                                $query_lista=mysqli_query($conexion,$lista);                                    
                                while($row = mysqli_fetch_array($query_lista)){
                                echo '<option value="'.$row['id'].'">'.utf8_encode($row['nombre_subitem']).'</option>';
                                }   
                            ?>
						</select>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese Documento de Identidad">
						<input class="input100" type="text" name="documento" id="documento" onkeypress="return esInteger(event)">
						<span class="focus-input100" data-placeholder="Documento"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Ingrese Nombre Completo">
						<input class="input100" type="text" name="nombre_completo" id="nombre_completo">
						<span class="focus-input100" data-placeholder="Nombre Completo"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese Correo Electronico">
						<input class="input100" type="text" name="email" id="mail" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com">
						<span class="focus-input100" data-placeholder="Correo Electronico"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese Telefono">
						<input class="input100" type="text" name="telefono"	id="telefono">
						<span class="focus-input100" data-placeholder="Telefono"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Registrar
							</button>
						</div>
					</div>

					<br>

					<div class="text-center">
						<a class="btn btn-link" href="index.php">Volver al incio</a>
					</div>
				</form>
			</div>
		</div>
	</div>	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script type="text/javascript" src="js/alertify.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
	<script src="js/javascripts.js"></script>
</body>
</html>
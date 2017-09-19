
<!-- formulario que deberá

		1.Pedir bien los datos
		2.Una vez que estén bien introducirlos en la tabla 
		3.Codificar la contraseña
		
		-->
		<html>
		
			<head>
			
				<title>Registro optilu </title>
				
				<link rel="stylesheet" type="text/css" href="css/reset.css">
				<?php 
				include 'head.php';
				?>
				
				
				
			
				<style>
				.error{
					color: #FF0000;
					}
				
				</style>
			</head>
		
			<body>
			
			<header>
			
					<?php 
						include 'html/superior.html';
					?>
			</header>
			
			<nav>
					<?php 
						include 'html/navegacion.html';
					?>
			
			</nav>
			
			<!-- Código php de comprobación del formulario -->
			
			<?php
			
					/*declaración de variables vacías */
					$nombre=$email=$sexo=$pass="";
					/*Declaración de variables de error*/
					$nombreerr=$emailerr=$sexoerr=$passerr=$passerr2="";
					
					
					/*comprobación de que viene de un formulario*/
					
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						
							/*comprobaciones de que no hayan mandado un formulario vacío*/
								/*nombre*/
									if (empty($_POST["nom_us"])){
										
										$nombreerr="Debe introducir un nombre de usuario";
										
										}else{
											
											$nombre = comprobar($_POST["nom_us"]);
											
											
										}
								/*email correcto */
									if (empty($_POST["email"])){
										
										$emailerr="Debe introducir un email de usuario";
										
									}else{
										
											$email = comprobar($_POST["email"]);
											
											
												if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
												$emailerr = "Introduce un formato de email válido";
								
											}
										}
								/*sexo no es posible mandarlo vacío así que no es necesario*/
								
								$sexo = comprobar($_POST["gender"]);
								
								/*contraseña*/
								
									if(empty($_POST["psw"])){
										
										$passerr="Debes introducir algo de contraseña";
										
									}else{
										
										$pass = comprobar($_POST["psw"]);
									}
					/*comprobación de que lo de arriba funciona
							echo "$nombre";
							echo "$email";
							echo "$sexo";
							echo "$pass";
							echo "$nombreerr";
							echo "$emailerr";
							echo "$passerr";
					*/
							
					
					/*comprobación de que las dos contraseñas son iguales*/
					
									if($_POST["psw"]!=$_POST["psw2"]){
										
										$passerr2="Las contraseñas no coinciden";
										
									}
								
								
					
					/*si todos los errores están vaciós, nos meteremos en el sql*/
					
							if (empty($nombreerr) and empty($emailerr) and empty($sexoerr) and empty($passerr) and empty ($passerr2)){
											
											/*esto era para comprobar que hasta aquí funcionaba	
												echo "Este serie el ejemplo de un buen usuario";
											*/
							
							/* Si ha llegado hasta aquí, significa que no hay mensajes de errores, podemos empezar a meterle en la base de datos */
								
								/*Conexión con la base de datos*/
								
								$servername="mysql.hostinger.es";
								$username="u356570667_usu";
								$password="bitcoiner";
								$dbname="u356570667_usus";
								
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								
								/*comprobar que la conexión está bien hecha*/
								
									if (!$conn) {
									die("Connection failed: " . mysqli_connect_error());
									}else{
										/*Esto era para comprobar que hasta aquí funcionaba
										echo "La conexión esta bien";
										*/
									}

								/*insertar el usuario en la tabla*/
								
									$sql = "INSERT INTO usuarios (usuario, clave, email)
									VALUES ('$nombre', '$pass', '$email')";
					
									if (mysqli_query($conn, $sql)) {
										$msg_usuario_creado="Se ha creado su usuario, disfrute!";
									} else {
										echo "Error: " . $sql . "<br>" . mysqli_error($conn);
									}

									mysqli_close($conn);
								
								/*Posibles mejoras 
								1. No dejar que se registre alguien con un nombre de usuario que ya exista
								2. Contraseña mínima de 8 caracteres 
								3. Confirmación de email
								
								*/
								
								}else{
									
									echo "Algo ha fallado, no puedo introducirte en la bd";
								}
					
					}
					
					/*funciones*/
					
					function comprobar($algo){
						
								$algo = trim($algo);
								$algo = stripslashes($algo);
								$algo= htmlspecialchars($algo);
								return $algo;
								
					}
			
			
			?>
			
			<div id="contenedor">
			
			
				<h1> Es hora de registrarse en la web! </h1>
				
				<?php
				echo "$msg_usuario_creado";
				?>
				<!-- Este formulario es enviado a sí mismo-->
				
				<p>*=campos obligatorios</p>
				
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				
				
								<p>1.Introduce tu nombre de usuario</p>				<br>
								<span class="error">* <?php echo "$nombreerr";?></span><br>
								<input type="text" name="nom_us">			<br>
								
								
								<p>2.Introduce una dirección de correo electrónico</p>	<br>
								<span class="error">* <?php echo "$emailerr";?></span>	<br>
								<input type="text" name="email">					<br>
																					<br>
							
								<p>3.Introduce tu género</p>
								<input type="radio" name="gender" value="male" checked> Hombre<br>
								<input type="radio" name="gender" value="female"> Mujer<br>
								
								<p>4.Introduce una contraseña segura</p>				<br>
								<input type="password" name="psw">				<br>
								<span class="error">* <?php echo "$passerr";?></span>	<br>
								
								<p>4.2.Repite la contraseña </p>				<br>
								<input type="password" name="psw2">				<br><br>
								<span class="error">* <?php echo "$passerr2";?></span>	<br>
							
						<input type="submit" value="Submit">
						
				</form>
				
			</div>
			</body>
			
		</html>
		
		
		
	
		
		

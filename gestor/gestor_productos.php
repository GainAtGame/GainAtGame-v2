
<!-- Código para extraer de la base de datos los datos de las gafas-->


			<?php 
		
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
										
										/*Obtener los datos de la base de datos*/
										
										$sql = "SELECT * FROM Gafas";
										
										/*no encunetro el fallo */
										$result = mysqli_query($conn, $sql);
										
										while ($row = mysqli_fetch_array($result)){


											$row = mysqli_fetch_array($result, MYSQLI_BOTH);
											echo  $row[0], $row[1], $row[2], $row[3], $row[4]  ;
											
											
											}
									}
									
									
										mysqli_close($conn);
									
									
								?>
					
									
										
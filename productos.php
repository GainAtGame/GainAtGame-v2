<!DOCTYPE html>


<html>
	
	
	
	<head>
			<title>Productos de la óptica </title>
			<!-- incluir el logo -->
			
			
			<?php 
				include 'head.php';
			?>
		
		
	</head>

	
	<body>
		
			<header>
			
					<?php 
							include 'html/superior.html';
						?>
			
				</header>
			
			
		<div id="contenedor">
		
				
			
			<nav>
			
				<?php 
							include 'html/navegacion.html';
						?>
			
			
			</nav>
			
			<p>
			Página principal de la óptica
			</p>
			
			
			<!-- tomará todos los productos de una tabla de la bdatos-->
			
			
			<?php
							include 'gestor/gestor_productos.php'
				?>
			
			
			<footer>
			
			</footer>
			
		</div>
	</body>



</html>
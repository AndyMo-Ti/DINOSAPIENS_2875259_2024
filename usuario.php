<?php 
	session_start();
	if (!isset($_SESSION['rol'])) 
		{
			header('location: iniciosesion.php');
		}
	else
		{
			if ($_SESSION['rol'] !=2)
				{
					header('Location: iniciosesion.php');
				}
		}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="stylesheet" href="usuario.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Usuario</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

		<style>
			body
			{
				background-image: url(<?php $fondo = $_SESSION["papel"]; echo "$fondo"; ?>);
				background-size: cover;
			}
		</style>

	</head>
	<body>

		<nav class="navbar body">	
			<form>
				<button type="button" class="editar"><a href="avatares.php" ><div align='center' class="avatars"><img src='imagenes/cavatar.png' width='65' height='65'></div></a></button>
				<button type="button" class="editar"><a href="fondos.php" ><div align='center' class="fondos"><img src='imagenes/cfondo.png' width='65' height='65'></div></a></button>
			</form>	
		</nav>

		<form method="post" action="iniciosesion.php" onsubmit="confirmLogout()" class="regreso">
			<button onclick="confirmLogout()" type="submit" class="regreso">Cerrar Dino_sesion</button>
			<script type="text/javascript">
				function confirmLogout() {

					const userConfirmed = confirm('¿Estás seguro de querer cerrar sesión? Reliza dos veces la confirmacion');
							
					if (userConfirmed) {

						window.location.href = 'cerrarsesion.php';
					} 
					else 
					if(!userConfirmed){

						console.log('Cancelado.');
					}
				}
			</script>
		</form>

		<h2 class="usuario">
			<?php  
				$usuario = $_SESSION["nomusuario"];
				echo "<br>$usuario<br>";
			?>
		</h2>

		<h3 align="center">
			<?php  
				$fotosesion=$_SESSION["foto"]; 
				echo "<img class='rounded-circle img-thumbnail border-5 border-dark' src='imagenes/$fotosesion' width='270' height='270'></div>";
			?>
		</h3><br><br>
		<h3 align="center" class="inicio">Comencemos</h3><br>
		<table style="font-family: this cafe" class="table table-hover table-bordered table-dark table-md align-middle w-50 p-3" border="5" align="center">
			<thead class="text-center">
				<tr>
					<th><form method="post"><button type="submit" name="mates" class="pulse">Matematicas</button></form></th>
					<th><form method="post"><button type="submit" name="ingles" class="pulse">Ingles</button></form></th>
					<th><form method="post"><button type="submit" name="español" class="pulse">Gramatica</button></form></th>
				</tr>
			</thead>
		</table>
			<?php
				if(isset($_POST['mates'])){

					header('location: ejercicio_mat1.php');
				}
				if(isset($_POST['ingles'])){

					header('location: ejercicio_ing1.php');
				}
				if(isset($_POST['español'])){

					header('location: ejercicio_español.php');
				}
			?>

			<?php

				$servername = "localhost";
				$username = "root"; 
				$password = ""; 
				$dbname = "aventura_dinosapiens";

				$conn = new mysqli($servername, $username, $password, $dbname);

				$consulta="SELECT *FROM perfiles WHERE nomusuario = '$usuario'";
				$ejecutar=mysqli_query($conn,$consulta);
					
				while ($fila=mysqli_fetch_array($ejecutar))
					{
					$id=	     $fila['id'];
					$usuario=    $fila['nomusuario'];
					$password=   $fila['clave'];
					$idrol=	     $fila['idrol'];
					$fotosesion= $fila['foto'];

			?>

		<?php
					}
		?>

		<?php
				if(isset($_GET['borrar']))
				{
					$borrar_id=$_GET['borrar'];
					$borrar="DELETE FROM usuarios WHERE id='$borrar_id'";
					$ejecutar=mysqli_query($conexion,$borrar);
					if ($ejecutar) 
					{
						echo "<script>windows.open('usuario.php')</script>";
					}
					else
					{
						echo "<script> alert('noooooooooooo')</script>";
					}
				}
		?>

	</body>
</html>
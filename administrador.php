<?php 
include_once 'conexionPDO.php';
	session_start();
	if (!isset($_SESSION['rol'])) 
		{
			header('location: login.php');
		}
	else
		{
			if ($_SESSION['rol'] !=1)
				{
					header('Location: login.php');
				}
		}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Administrador</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</head>

<style>
            body
            {
                background-image: url('imagenes/fn0.jpg');
                background-size: cover;
            }
			h1.titulo{
				font-family: this cafe; font-size: 40px;
				color: white;
			}
			h2.usuario{
				font-family: pixeled; font-size: 25px;
				color: white;
			}

</style>

<body align="center">

	<br><br><h1 align="center" class="titulo">Bienvenido/a Administrador/a</h1><br>
	
	<h2 align="center" class="usuario">

		<?php  
		$usuario = $_SESSION["nomusuario"];

		echo "$usuario<br><br>";

		?>

	</h2>

	<h3 align="center">
		
		<?php  
		$fotosesion=$_SESSION["foto"]; 
		echo "<img class='rounded-circle img-thumbnail border-5 border-dark' src='imagenes/$fotosesion' width='270' height='270'></div>";
		?>

	</h3>

<br>

	<table style="font-family: pixeled; font-size: 11px" class="table table-hover table-bordered table-dark table-md align-middle w-50 p-3" border="7" align="center">
		<thead class="text-center">
			<tr>
				<th colspan="4" scope="col">GESTION DE ADMINISTRADOR</th>
			</tr>
			<tr>
				<th scope="col">NICK</th>
				<th scope="col">AVATAR</th>
				<th scope="col">EDITAR</th>
			</tr>
		</thead>

		<?php

			$servername = "localhost";
			$username = "root"; 
			$password = "";
			$dbname = "aventura_dinosapiens";

			$conn = new mysqli($servername, $username, $password, $dbname);

			$consulta="SELECT *FROM administrador";
			$ejecutar = $conn->query($consulta);

			while ($fila=mysqli_fetch_array($ejecutar))
				{
					$id=	     $fila['id'];
					$usuario=    $fila['nomusuario'];
					$password=   $fila['clave'];
					$idrol=	     $fila['idrol'];
					$fotosesion= $fila['foto'];

					?>
					
					<tbody class="text-center">
						<tr>
							<td><?php echo $usuario ?> </td>
							<td><?php echo "<div align='center'><img class='img-thumbnail border-0' src='imagenes/$fotosesion ?>' width='80' height='80'></div>"; ?> </td>
							<td><button class="btn btn-dark btn-sm" style='color-white'><a href="administrador.php? editar2=<?php echo $id; ?>"><div align='center'><img src='imagenes/editar.png' width='45' height='45'></div></a></button></td>
						</tr>
				
						<?php
				}
						?>

					</tbody>
	</table>

	<br>

	<?php

		if(isset($_GET['editar2']))
			{
				$editar_id=$_GET['editar2'];

				$servername = "localhost";
				$username = "root"; 
				$password = ""; 
				$dbname = "aventura_dinosapiens";
	
				$conn = new mysqli($servername, $username, $password, $dbname);

				$consulta="SELECT *FROM administrador WHERE id='$editar_id'";
				$ejecutar=mysqli_query($conn,$consulta);

				$fila=mysqli_fetch_array($ejecutar);
					$id=	     $fila['id'];
					$usuario=    $fila['nomusuario'];
					$password=   $fila['clave'];
					$idrol=	     $fila['idrol'];
					$fotosesion= $fila['foto'];

	?>

		<form method="POST" id="updateForm" action="" align='center'>
			<table style="font-family: pixeled; font-size: 13px" class="table table-hover table-bordered table-dark table-sm align-middle w-auto p-3" border="7" align="center">

				<thead class="text-center">
					<tr>
						<th>
							<br>
							<label>NICK:</label>
							<input type="text" name="nombre" value="<?php echo $usuario; ?>" size="15" minlength="4" maxlength="15" pattern="[a-z]{4,15}"><br><br>

							<label>CONTRASEÑA:</label> 
							<input type="password" name="contra" value="<?php echo $password; ?>" size="10" minlength="5" maxlength="11"><br><br>

							<input type="submit"  	name="actualizar2" 	value="ACTUALIZAR DATOS"><br>
							<br>
						</th>	
					</tr>
				</thead>
			</table>
		</form>	

	<?php
			}
	?>
	
	
<?php

if (isset($_POST['actualizar2'])) 
{

	$servername = "localhost";
	$username = "root"; 
	$password = ""; 
	$dbname = "aventura_dinosapiens";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
		{
			die("Conexión fallida: " . $conn->connect_error);
		}

	$actualiza_nombre=  $_POST['nombre'];
	$actualiza_password=$_POST['contra'];

	$update="UPDATE administrador SET nomusuario='$actualiza_nombre',
								      clave=      '$actualiza_password' WHERE id='$editar_id';";
								
	$ejecutar1=mysqli_query($conn,$update);
		if ($ejecutar1) 
			{
				echo "<script>windows.open('administrador.php')</script>";
			}
		else
			{
				echo "<script> alert('¡No se pudo actualizar los datos!')</script>";
			}
}

	if(isset($_GET['borrar2']))
		{

		$servername = "localhost";
		$username = "root"; 
		$password = ""; 
		$dbname = "aventura_dinosapiens";

		$conn = new mysqli($servername, $username, $password, $dbname);

		$borrar_id=$_GET['borrar2'];
		$borrar="DELETE FROM administrador WHERE id='$borrar_id'";
		$ejecutar=mysqli_query($conn,$borrar);
		if ($ejecutar) 
			{
				echo "<script>windows.open('administrador.php')</script>";
			}
		else
			{
				echo "<script> alert('¡No se pudo eliminar el perfil!')</script>";
			}
		}
?>


		<br>


		<table style="font-family: pixeled; font-size: 11px" class="table table-hover table-bordered table-dark table-md align-middle w-50 p-3" border="7" align="center">
		<thead class="text-center">
			<tr>
				<th colspan="4" scope="col">GESTION DE EXPLORADORES</th>
			</tr>
			<tr>
				<th scope="col">NICK</th>
				<th scope="col">AVATAR</th>
				<th scope="col">EDITAR</th>
				<th scope="col">BORRAR</th>
			</tr>
		</thead>

		<?php

			$servername = "localhost";
			$username = "root"; 
			$password = ""; 
			$dbname = "aventura_dinosapiens";

			$conn = new mysqli($servername, $username, $password, $dbname);

			$consulta="SELECT *FROM perfiles";
			$ejecutar = $conn->query($consulta);

			while ($fila=mysqli_fetch_array($ejecutar))
				{
					$id=	     $fila['id'];
					$usuario=    $fila['nomusuario'];
					$password=   $fila['clave'];
					$idrol=	     $fila['idrol'];
					$fotosesion= $fila['foto'];

					?>
					
					<tbody class="text-center">
						<tr>
							<td><?php echo $usuario ?> </td>
							<td><?php echo "<div align='center'><img class='img-thumbnail border-0' src='imagenes/$fotosesion ?>' width='80' height='80'></div>"; ?> </td>
							<td><button class="btn btn-dark btn-sm" style='color-white'><a href="administrador.php? editar=<?php echo $id; ?>"><div align='center'><img src='imagenes/editar.png' width='45' height='45'></div></a></button></td>
							<td><button class="btn btn-dark btn-sm" style='color-white'><a href="administrador.php? borrar=<?php echo $id; ?>"><div align='center'><img src='imagenes/borrar.png' width='45' height='45'></div></a></button></td>
						</tr>
				
						<?php
				}
						?>

					</tbody>
	</table>

	<br>

	<?php

		if(isset($_GET['editar']))
			{
				$editar_id=$_GET['editar'];

				$servername = "localhost";
				$username = "root"; 
				$password = ""; 
				$dbname = "aventura_dinosapiens";
	
				$conn = new mysqli($servername, $username, $password, $dbname);

				$consulta="SELECT *FROM perfiles WHERE id='$editar_id'";
				$ejecutar=mysqli_query($conn,$consulta);

				$fila=mysqli_fetch_array($ejecutar);
					$id=	     $fila['id'];
					$usuario=    $fila['nomusuario'];
					$password=   $fila['clave'];
					$idrol=	     $fila['idrol'];
					$fotosesion= $fila['foto'];

	?>

		<form method="POST" id="updateForm2" action="" align='center'>
			<table style="font-family: pixeled; font-size: 13px" class="table table-hover table-bordered table-dark table-sm align-middle w-auto p-3" border="7" align="center">

				<thead class="text-center">
					<tr>
						<th>
							<br>
							<label>NICK:</label>  	
							<input type="text" name="nombre" value="<?php echo $usuario; ?>" size="15" minlength="4" maxlength="15" pattern="[a-z]{4,15}"><br><br>

							<label>CONTRASEÑA:</label>  : 
							<input type="password" 	name="contra" value="<?php echo $password; ?>" size="10" minlength="4" maxlength="4" pattern="\{4}"><br><br>

										<input type="submit"  	name="actualizar" 	value="ACTUALIZAR DATOS"><br>
							<br>
						</th>	
					</tr>
				</thead>
			</table>
		</form>	

	<?php
			}
	?>
	
	
<?php

	if (isset($_POST['actualizar'])) 
		{

			$servername = "localhost";
			$username = "root"; 
			$password = ""; 
			$dbname = "aventura_dinosapiens";
	
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) 
				{
					die("Conexión fallida: " . $conn->connect_error);
				}

			$actualiza_nombre=  $_POST['nombre'];
			$actualiza_password=$_POST['contra'];

			$update="UPDATE perfiles SET nomusuario='$actualiza_nombre',
										 clave=      '$actualiza_password' WHERE id='$editar_id';";
										
			$ejecutar1=mysqli_query($conn,$update);
				if ($ejecutar1) 
					{
						echo "<script>windows.open('administrador.php')</script>";
					}
				else
					{
						echo "<script> alert('¡No se pudo actualizar los datos!')</script>";
					}
		}

	if(isset($_GET['borrar']))
		{

		$servername = "localhost";
		$username = "root"; 
		$password = ""; 
		$dbname = "aventura_dinosapiens";

		$conn = new mysqli($servername, $username, $password, $dbname);

		$borrar_id=$_GET['borrar'];
		$borrar="DELETE FROM perfiles WHERE id='$borrar_id'";
		$ejecutar=mysqli_query($conn,$borrar);
		if ($ejecutar) 
			{
				echo "<script>windows.open('administrador.php')</script>";
			}
		else
			{
				echo "<script> alert('¡No se pudo eliminar el perfil!')</script>";
			}
		}
?>

<form action="iniciosesion.php" method="POST">

	<table style="font-family: pixeled; font-size: 13px" class="table table-hover table-bordered table-dark table-sm align-middle w-auto p-3" border="7" align="center">
		<thead class="text-center">
			<tr>
				
				<th>
					<input type="submit" value="Cerrar sesion" name="cerrar_sesion">
				</th>	
				
			</tr>
		</thead>
	</table>
</form>

</body>
</html>
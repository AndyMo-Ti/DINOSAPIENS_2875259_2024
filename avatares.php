<?php 
include_once 'conexionPDO.php';
	session_start();
	if (!isset($_SESSION['rol'])) 
		{
			header('location: login.php');
		}
	else
		{
			if ($_SESSION['rol'] !=2)
				{
					header('Location: login.php');
				}
		}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Avatares</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</head>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

	<style>
			body
				{
					background-image: url('fondo-avatares.png');
					background-size: cover;
				}
				table.text-center{
					color: white;
				}
	</style>

	<body align="center">

		<table style="font-family: fipps; font-size: 65px" class="text-center"><thead><tr><th style="font-family: this cafe"> CAMBIO DE AVATAR </th></tr></thead></table><br>

			<table style="font-family: pixeled; font-size: 9px" class="table float-start table-hover table-bordered table-dark table-sm align-middle table caption-top p-3" border="7" align="center">

				<?php

					$servername = "localhost";
					$username = "root"; 
					$password = ""; 
					$dbname = "aventura_dinosapiens";

					$conn = new mysqli($servername, $username, $password, $dbname);

					$consulta="SELECT *FROM avatares";
					$ejecutar=mysqli_query($conn,$consulta);

					while ($fila=mysqli_fetch_array($ejecutar))
						{
							$id=	    $fila['id_avatar'];
							$avatares=  $fila['avatar'];

				?>
					
							<table style="font-family: pixeled; font-size: 9px" class="table table-hover table-bordered table-dark table-sm align-middle table caption-top w-50 p-3" border="7" align="center">
								<thead class="text-center">
									<tr>
										<th scope="col">AVATAR</th>
										<th scope="col">APLICAR</th>
									</tr>
								</thead>

								<tbody class="text-center">
									<tr>
										<td><?php echo "<div align='center'><img class='img-thumbnail border-0' src='imagenes/$avatares ?>' width='110' height='110'></div>"; ?> </td>
										<td><button class="btn btn-dark btn-sm" style='color-white' onclick="confirmChange('<?php echo $avatares; ?>')"><div align='center'><img src='imagenes/check.png' width='35' height='35'></div></a></button></td>
									</tr>
					<?php
						}
					?>
								</tbody>
							</table>

			</table>

			<script>
				function confirmChange(avatar) 
				{
					Swal.fire
					({
						title: '¿Estás seguro?',
						text: "¿Deseas cambiar tu avatar actual por este? Los cambios se verán al reiniciar la sesión.",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Sí, cambiarlo',
						cancelButtonText: 'Cancelar'
					}).then((result) => 
					{
						if (result.isConfirmed) 
						{

							window.location.href = "?aplicar=" + avatar;
						}
					});
				}
			</script>

			<?php

				if(isset($_GET['aplicar']))
					{
						$editar_id=$_GET['aplicar'];
						$usuario=$_SESSION['id'];
						
						$servername = "localhost";
						$username = "root"; 
						$password = ""; 
						$dbname = "aventura_dinosapiens";
	
						$conn = new mysqli($servername, $username, $password, $dbname);

						$update="UPDATE perfiles SET foto='$editar_id' WHERE id='$usuario';";
													
						$ejecutar1=mysqli_query($conn,$update);
							if ($ejecutar1) 
								{
									echo "<script>href='usuario.php'</script>";
								}
							else
								{
									echo "<script> alert('No se pudieron aplicar los cambios')</script>";
								}
					}

		?>

		<form action="usuario.php" method="POST">

			<table style="font-family: pixeled; font-size: 13px" class="table table-hover table-bordered table-dark table-sm align-middle w-auto p-3" border="7" align="center">
				<thead class="text-center">
					<tr>
						
						<th>
							<input type="submit" value="Volver al perfil" name="cerrar_sesion">
						</th>	
						
					</tr>
				</thead>
			</table>
		</form>
	</body>
</html>
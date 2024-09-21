<?php
include_once 'conexionPDO.php';

session_start();
if(isset($_POST['cerrar_sesion']))
	{
		include_once 'cerrar.php';
		/*session_unset();
		session_destroy();*/
	}

ob_start();
?>

<html>
	<head>
		<title>Inicio de sesión</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link href="iniciosesion.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	</head>

	<body>

		<br><h1 class="titulo">Vamor a Comenzar</h1><br>

		<br><br>

		<div class="tabla1">
			<form method="POST" action="#">
				<table class="table table-bordered table-dark align-middle" border="7">
					<thead class="text-center">
						<tr>
							
							<th style="vertical-align: top;">
							
							<label style="font-size: 19px">NUEVO</label>
							<br><label style="font-size: 19px">EXPLORADOR:</label>

							<br><br><label>NICK</label>
							<br><input type="text" name="usuario" required="" size="15" minlength="4" maxlength="15" pattern="[a-z]{4,15}"><br>

							<br><h2 style="font-size: 10px; color: yellow;"><u>EL NICK DEBE ESTAR EN MINUSCULAS</u></h2>
								<h2 style="font-size: 10px; color: yellow;"><u>Y TENER ENTRE 4 Y 15 CARACTERES.</u></h2><br>

							<label>CLAVE</label>
							<br><input class="col-md-5" type="password" name="clave" required="" minlength="4" maxlength="4" pattern="\{4}"><br>

							<br><h2 style="font-size: 10px; color: yellow;"><u>LA CLAVE DEBEN SER MAXIMO</u></h2>
								<h2 style="font-size: 10px; color: yellow;"><u>4 NUMEROS.</u></h2>

							<br><input class="uno" type="submit"  name="insertar" value="CREAR"><br><br>

							</th>
				
						</tr>
					</thead>
				</table>
			</form>
		</div>
		<?php
            if (isset($_POST['insertar'])) 
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
            
                    $usuario = $_POST['usuario'];
                    $clave = $_POST['clave'];
                    $idrol = 2;
                    $foto = "av0.jpg";
                    $papel = "fn6.jpg";
            
                    $insertar = "INSERT INTO perfiles (nomusuario, clave, idrol, foto, papel) VALUES ('$usuario', '$clave', '$idrol', '$foto', '$papel');";
                    $ejecutar = $conn->query($insertar);
            
                    if ($ejecutar) 
                        {
							echo "<script>Swal.fire
							({
								icon: 'success',
								title: 'Explorador creado',
								text: 'El nuevo explorador ha sido creado exitosamente!',
								confirmButtonText: 'Aceptar'
							})
							.then((result) => {if (result.isConfirmed) 
								{
									window.location.href = 'iniciosesion.php';
								}
							});
							</script>";                        
						} 
                    else 
                        {
							echo "<script>Swal.fire
							({
								icon: 'error',
								title: 'Error',
								text: 'Error al insertar los datos: " . $conn->error . "'
							});
							</script>";                        
						}
            
                    $conn->close();
                }
        ?>

	<div class="tabla2">
		<form method="POST" action="#">

			<table class="table table-bordered table-dark align-middle" border="7">
				<thead class="text-center">
					<tr>
						<th style="vertical-align: top;">
						
						<label style="font-size: 19px">INGRESA COMO</label>
						<br><label style="font-size: 19px">ADMINISTRADOR:</label>

							<br><br><label>USUARIO</label>
							<br><input class="col-md-7" id="nombreusuario" type="text" name="nombreusuario">

							<br><br><label>CONTRASEÑA</label>
							<br><button type="button" id="imagenOjoAdmin" onmousedown="mostrarContrasenaAdmin()" onmouseup="ocultarContrasenaAdmin()">
							<img src="ojitocerrado.png" height="30px" width="40px" cursor: pointer;></button><input class="col-md-5" id="contrasenaAdmin" type="password" name="contrasenaAdmin" required autocomplete="off" minlength="5" maxlength="15"><br>

							<br><br><input type="submit" value="INGRESAR"><br><br>

						</th>	
					</tr>
				</thead>
			</table>
		</form>
	</div>

	<?php
	if(isset($_SESSION['rol']))
		{
			switch ($_SESSION['rol']) 
			{
				case 1:
					header('Location: administrador.php');
					break;
				case 2:
					header('Location: usuario.php');
					break;
				default:
					echo "Este rol no existe dentro de las opciones";
					break;
			}
		}

	if (isset($_POST['nombreusuario']) && isset($_POST['contrasenaAdmin']))
		{
			$username=$_POST['nombreusuario'];
			$password=$_POST['contrasenaAdmin'];

			$db=new Database();
			$query=$db->connectar()->prepare('SELECT * FROM administrador WHERE nomusuario=:nombreusuario AND clave=:contrasenaAdmin');
			$query->execute(['nombreusuario'=>$username,'contrasenaAdmin'=>$password]);
			$arreglofila=$query->fetch(PDO::FETCH_NUM);

			if ($arreglofila == true ) 
				{
					$rol=$arreglofila[3];
					$_SESSION['rol']=$rol;
					switch ($rol) 
						{
							case 1:
								header('Location: administrador.php');
								break;
							case 2:
								header('Location: usuario.php');
								break;
							default:
								echo "Este rol no existe dentro de las opciones";
								break;
						}

					$idusuario=$arreglofila[0];
					$_SESSION['id']=$idusuario;

					$usuario=$arreglofila[1];
					$_SESSION['nomusuario']=$usuario;
					
					$fotosesion=$arreglofila[4];
					$_SESSION['foto']=$fotosesion;

					$fondosesion=$arreglofila[5];
					$_SESSION['papel']=$fondosesion;
				}
			else
				{
					echo "<script>Swal.fire
					({
						icon: 'error',
						title: 'Oops...',
						text: 'Nombre de usuario o contraseña incorrecto',
						confirmButtonText: 'Intentar de nuevo'
					});
				  	</script>";				
				}
		}
	?>

	<div class="tabla3">
		<form method="POST" action="#">

			<table class="table table-bordered table-dark align-middle" border="7">
				<thead class="text-center">
					<tr>
						
						<th style="vertical-align: top;">
						
							<label style="font-size: 19px">INGRESA COMO</label>
							<br><label style="font-size: 19px">EXPLORADOR:</label>

							<br><br><label>NICK</label>
							<br><input id="nombreusuario2" type="text" name="nombreusuario2" size="15" minlength="4" maxlength="15" pattern="[a-z]{4,15}">

							<br><br><h2 style="font-size: 10px; color: yellow;"><u>SI NO RECUERDAS TU NICK</u></h2>
							<h2 style="font-size: 10px; color: yellow;"><u>AVISA AL ADMINISTRADOR.</u></h2>

							<br><label>CLAVE</label>
							<br><button type="button" id="imagenOjoExplorador" onmousedown="mostrarContrasenaExplorador()" onmouseup="ocultarContrasenaExplorador()">
							<img src="ojitocerrado.png" height="30px" width="40px" cursor: pointer;>
							</button><input class="col-md-5" id="contrasenaExplorador" type="password" name="contrasenaExplorador" required autocomplete="off" minlength="4" maxlength="4">					
							<br><br><h2 style="font-size: 10px; color: yellow;"><u>SI NO RECUERDAS TU CLAVE</u></h2>
								<h2 style="font-size: 10px; color: yellow;"><u>AVISA AL ADMINISTRADOR.</u></h2>

								<br><input type="submit" value="INGRESAR"><br><br>
						</th>	

					</tr>
				</thead>
			</table>

		</form>
	</div>
	<?php
		if(isset($_SESSION['rol']))
			{
				switch ($_SESSION['rol']) 
					{
						case 1:
							header('Location: administrador.php');
							break;
						case 2:
							header('Location: usuario.php');
							break;
						default:
							echo "Este rol no existe dentro de las opciones";
							break;
					}
			}

		if (isset($_POST['nombreusuario2']) && isset($_POST['contrasenaExplorador']))
			{
				$username=$_POST['nombreusuario2'];
				$password=$_POST['contrasenaExplorador'];

				$db=new Database();
				$query=$db->connectar()->prepare('SELECT * FROM perfiles WHERE nomusuario=:nombreusuario2 AND clave=:contrasenaExplorador');
				$query->execute(['nombreusuario2'=>$username,'contrasenaExplorador'=>$password]);
				$arreglofila=$query->fetch(PDO::FETCH_NUM);

				if ($arreglofila == true ) 
					{
						$rol=$arreglofila[3];
						$_SESSION['rol']=$rol;
						switch ($rol) 
							{
								case 1:
									header('Location: administrador.php');
									break;
								case 2:
									header('Location: usuario.php');
									break;
								default:
									echo "Este rol no existe dentro de las opciones";
									break;
							}

						$idusuario=$arreglofila[0];
						$_SESSION['id']=$idusuario;

						$usuario=$arreglofila[1];
						$_SESSION['nomusuario']=$usuario;
						
						$fotosesion=$arreglofila[4];
						$_SESSION['foto']=$fotosesion;

						$fondosesion=$arreglofila[5];
						$_SESSION['papel']=$fondosesion;
					}
				else
					{
						echo "<script>Swal.fire
						({
							icon: 'error',
							title: 'Oops...',
							text: 'Nombre de usuario o contraseña incorrecto',
							confirmButtonText: 'Intentar de nuevo'
						});
						  </script>";					
					}
			}
	?>

		<!-- JavaScript para Administrador -->
	<script>
		var contrasenaInputAdmin = document.getElementById("contrasenaAdmin");
		function mostrarContrasenaAdmin() {
			contrasenaInputAdmin.type = "text";
		}
		function ocultarContrasenaAdmin() {
			contrasenaInputAdmin.type = "password";
		}
	</script>

		<!-- JavaScript para Explorador -->
	<script>
		var contrasenaInputExplorador = document.getElementById("contrasenaExplorador");
		function mostrarContrasenaExplorador() {
			contrasenaInputExplorador.type = "text";
		}
		function ocultarContrasenaExplorador() {
			contrasenaInputExplorador.type = "password";
		}
	</script>

<div class="regreso">
    <form action="paginainicial.php" method="POST">
        <button type="submit" name="regreso" class="regreso">Volver al Inicio</button>
    </form>
</div>

	</body>
</html>	
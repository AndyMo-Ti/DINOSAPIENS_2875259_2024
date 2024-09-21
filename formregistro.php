<?php
    $conexion=include_once 'conexionPDO.php';
    ob_start()
?>

<html>
    <head>
        <title>Registro de Perfil</title>
            <link rel="stylesheet" href="formregistro.css">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

        <?php

                $servername = "localhost";
                $username = "root"; 
                $password = ""; 
                $dbname = "aventura_dinosapiens";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) 
                {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $conn->select_db($dbname);

                    $sql = "CREATE TABLE IF NOT EXISTS administrador (id INT (11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,nomusuario VARCHAR (15) NOT NULL, clave VARCHAR (11), idrol INT (1), foto VARCHAR (11), papel VARCHAR (11))";

                    if ($conn->query($sql) === TRUE)
                        {
                            echo "";
                        } 
                    else 
                        {
                            die("Error al crear la tabla 'administrador'" . $conn->error . "<br>");
                        }


                    $sql  = "CREATE TABLE IF NOT EXISTS roles (id INT AUTO_INCREMENT PRIMARY KEY, rol INT (2));";

                    if ($conn->query($sql) === TRUE) 
                        {
                            echo "";
                        } 
                    else 
                        {
                            echo "Error al crear la tabla 'roles': " . $conn->error . "<br>";
                        }


                    $sql  = "CREATE TABLE IF NOT EXISTS avatares (id_avatar INT AUTO_INCREMENT PRIMARY KEY, avatar VARCHAR (11));";
                    
                    if ($conn->query($sql) === TRUE) 
                        {
                            echo "";
                        } 
                    else
                        {
                            echo "Error al crear la tabla 'avatares': " . $conn->error . "<br>";
                        }


                    $sql  = "CREATE TABLE IF NOT EXISTS fondos (id_fondo INT AUTO_INCREMENT PRIMARY KEY, fondo VARCHAR (11));";

                    if ($conn->query($sql) === TRUE) 
                        {
                            echo "";
                        } 
                    else 
                        {
                            echo "Error al crear la tabla 'fondos': " . $conn->error . "<br>";
                        }


                    $sql  = "CREATE TABLE IF NOT EXISTS perfiles (id INT (11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nomusuario VARCHAR (15) NOT NULL, clave INT (4), idrol INT (1), foto VARCHAR (11), papel VARCHAR (11))";

                    if ($conn->query($sql) === TRUE) 
                        {
                            echo "";
                        } 
                    else 
                        {
                            echo "Error al crear la tabla 'perfiles': " . $conn->error . "<br>";
                        }
            
                        $conn = new mysqli($servername, $username, $password);
            
                        if ($conn->connect_error) 
                            {
                                die("Conexión fallida: " . $conn->connect_error);
                            }

                        $conn->select_db($dbname);

                $conn->close();

        ?>

        <img src="logos/logo-blanco-no-background.png" class="logo"></button>
        <form action="paginainicial.php"><button name="regreso" class="regreso">Dino-Regreso</button></form>
        <br><br><p class="form">REGISTRO DE<br> ADMINISTRADOR</p><br>

        <form method="post" action="#" onsubmit="return validarContraseñas();">
            <table class="table table-bordered table-dark align-middle" border="7">
                <thead class="text-center">
                    <tr> 
                        <th>

                            <br><label>  NOMBRE DE USUARIO</label>
                                <br><input type="text"name="usuario" required="" size="15" minlength="4" maxlength="15" pattern="[a-z]{4,15}"><br><br>

                                <h2 style="font-size: 10px; color: yellow;"><u>EL NOMBRE DE USUARIO DEBE ESTAR EN</u></h2>
                                <h2 style="font-size: 10px; color: yellow;"><u>MINUSCULAS Y TENER ENTRE 4 Y 15 CARACTERES.</u></h2>
                                
                            <br><label>CONTRASEÑA</label>
                                <br><input type="password" id="password" name="clave" required="" size="15" minlength="5" maxlength="11"><br><br>

                                <h2 style="font-size: 10px; color: yellow;"><u>LA CONTRASEÑA DEBE TENER ENTRE</u></h2>
                                <h2 style="font-size: 10px; color: yellow;"><u>5 Y 11 CARACTERES.</u></h2>

                            <br><label>CONFIRMA LA CONTRASEÑA</label>
                                <br><input type="password" id="conf_password" name="clave" required="" size="15" minlength="5" maxlength="11"><br><br>
                                
                                <button class="uno" type="submit"  name="insertar" >CREAR</button>
                                <br><br>
                                
                        </th>	
                    </tr>
                </thead>
            </table>
        </form>

       <!-- <form action="paginainicial.php" method="POST" >
                <input class="regreso" type="submit" value="Regresar" name="regresar">
        </form>-->

        <div class="carousel">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="fondo-carousel-3.png" class="d-block w-100">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="fondo-carousel-2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="fondo-carousel-4.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="fondo-carousel-1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="fondo-carousel-5.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
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
                $idrol = 1;
                $foto = "adm1.png";
                $papel = "fn0.jpg";

                $insertar = "INSERT INTO administrador (nomusuario, clave, idrol, foto, papel) VALUES ('$usuario', '$clave', '$idrol', '$foto', '$papel')";
                $ejecutar = $conn->query($insertar);

                if ($ejecutar) 
                {
                    $sql = "INSERT INTO fondos (fondo) VALUES ('fn1.jpg'), ('fn2.jpg'), ('fn3.jpg'), ('fn4.jpg'), ('fn5.jpeg'), ('fn6.jpg'), ('fn7.jpg'), ('fn8.png')";
                    $conn->query($sql);

                    $sql = "INSERT INTO avatares (avatar) VALUES ('av1.jpg'), ('av2.jpg'), ('av3.jpg'), ('av4.jpg'), ('av5.jpg'), ('av6.jpg'), ('av7.jpg'), ('av8.jpg')";
                    $conn->query($sql);

                    header('location: iniciosesion.php');
                } 
                else 
                {
                    echo "Error al insertar los datos: " . $conn->error;
                }

                $conn->close();
            }
        ?>
            <script>
                function validarContraseñas() 
                    {
                        var password = document.getElementById('password').value;
                        var confPassword = document.getElementById('conf_password').value;

                        if (password !== confPassword) 
                        {
                            Swal.fire
                                ({
                                    icon: 'error',
                                    title: 'Oops!',
                                    text: 'Las contraseñas no coinciden. Por favor, inténtelo de nuevo.',
                                    confirmButtonText: 'Aceptar'
                                });
                            return false;
                        }

                        return true;
                    }
            </script>
    </body>

</html>   
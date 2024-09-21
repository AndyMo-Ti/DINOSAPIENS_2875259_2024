<html>   
    <head>  
        <link rel="stylesheet" href="style.css">
    </head>
    <body align="center">
        <img class="logo" src="logos/logo-no-background2.png">
        <form method="post"><br><br>
            <p class="uno">Iniciar Dino-aventura: </p><br>
            <!--<button type="submit" name="registrar" class="uno">Comenzar</button><br><br>-->
            <div class="wrapper">
                <button type="submit" name="registrar">
                   Comenzar
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div><br><br>
        </form>

                <?php
                    if(isset($_POST['registrar']))
                    {
                        
                        $servername = "localhost";
                        $username = "root"; 
                        $password = ""; 
                        $dbname = "aventura_dinosapiens"; 

                        // crea conexión
                        $conn = new mysqli($servername, $username, $password);

                            if ($conn->connect_error) {
                                die("Conexión fallida: " . $conn->connect_error);
                            }


                            //borra la bd si ya existia
                            $sql = "DROP DATABASE IF EXISTS $dbname";

                            if ($conn->query($sql) === TRUE) {

                                echo "Base de datos eliminada con éxito (si existía).<br>";

                            } else 
                            {
                                die("Error al eliminar la base de datos: " . $conn->error . "<br>");
                            }



                            // crea la base de datos
                            $sql = "CREATE DATABASE $dbname";

                            if ($conn->query($sql) === TRUE) {
                                
                                echo "Base de datos creada exitosamente";
                            } else {
                                echo "Error creando base de datos: " . $conn->error;
                            }

                        $conn->close();

                        header('Location: formregistro.php');

                    }
    
                ?>
    
    </body>
</html>




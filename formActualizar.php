<?php
    if (isset($_POST['actualizar'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "aventura_dinosapiens";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Obtener datos del formulario
        $actualiza_nombre = $_POST['nombre'];
        $actualiza_password = $_POST['contra'];

        // Consulta SQL para actualizar datos
        $update = "UPDATE perfiles SET nomusuario='$actualiza_nombre', clave='$actualiza_password' WHERE id='$editar_id'";
        $ejecutar1 = mysqli_query($conn, $update);

        if ($ejecutar1) {
            // Redireccionar a la página de administrador
            echo "<script>window.location.href = 'administrador.php';</script>";
        } else {
            echo "<script>alert('¡No se pudo actualizar los datos!');</script>";
        }

        // Cerrar conexión
        $conn->close();
    }
?>



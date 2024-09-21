<?php
//datos de la base de datos

$usuario="root";
$password="";
$servidor="localhost";
$basededatos="crud";
// creacion de la conexion a la base de datos con mysqli
$conexion=mysqli_connect($servidor,$usuario,"") or die ("no ha sido posible la conexion al servidor");
// seleccionando la base de datos a emplear
$selecbasededatos=mysqli_select_db($conexion,$basededatos) or die("No se ha conectado a la base de datos");
//Realizamos la consulta de la tabla respectiva
$consulta="SELECT *FROM usuarios";
//almacenamos la consulta 
$resultado=mysqli_query($conexion,$consulta) or die ("algo salio mal en la consulta a la base de datos");

//$conexion=mysqli_connect("localhost","root","","crud");


?>



<?php
try 
    {
    $conexion=mysqli_connect("localhost","root","","crud") or die ("Problemas en la conexion");
    echo '<p style="color: green; font-size: 20px; text-align:center">¡A Caray!  Conexion Exitosa</p><br>';
 ?>

<?php
// Realizamos una consulta preparada para seleccionar solo las columnas necesarias. Asi mejoramos el rendimiento y reducimos el ancho de banda.
    $consulta = "SELECT id, nomusuario, clave, idrol, email FROM usuarios";
    //$consulta="SELECT *FROM usuarios";
    $ejecutar=mysqli_query($conexion,$consulta);
     // Verificar si la consulta se ejecutó correctamente
    if (!$ejecutar) 
        {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_error($conexion));
        }
    if (mysqli_num_rows($ejecutar) > 0)// Verificar si hay resultados
        {
            // Crear tabla HTML para mostrar los datos
?>   
            <table border="3" bgcolor="orange" align="center" style="border-color: red;">
                <tr align="center" bgcolor="red">
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th>Idrol</th>
                    <th>Email</th>
                </tr>
<?php
            // Iterar sobre los resultados y mostrar cada fila
            while ($fila=mysqli_fetch_array($ejecutar))
                {
//usamos htmlspecialchars(), para evitar ataques de Cross-Site Scripting (XSS) al imprimir contenido dinámico en una página web.
                    $id=      htmlspecialchars($fila['id']);
                    $usuario= htmlspecialchars($fila['nomusuario']);
                    $password=htmlspecialchars($fila['clave']);
                    $idrol=   htmlspecialchars($fila['idrol']);
                    $email=   htmlspecialchars($fila['email']);
?>
                    <tr align="center">
                        <td><?php echo $id ?></td>
                        <td><?php echo $usuario ?> </td>
                        <td><?php echo $password ?> </td>
                        <td><?php echo $idrol ?> </td>
                        <td><?php echo $email ?> </td>
                    </tr>  
<?php
                }
?>
            </table><br><br><br>
<?php
        } 
    else 
        {
            echo '<p style="color: red; font-size: 20px; font-weight: bold; text-align:center;">¡Ups! Parece que no hay registros.</p><br>';
        }
    // Cerrar conexión
    mysqli_close($conexion);  
    } 
catch (Exception $e) 
    {
    // Capturar cualquier excepción lanzada dentro del bloque try
        echo "Error: " . $e->getMessage();
    }        
?>



<?php
/*function conectar(){
    $host = "localhost";
    $user = "root"; // Para propósitos educativos únicamente
    $clave = "";
    $bd = "crud";
    $conexion = new mysqli($host, $user, $clave, $bd);
    if($conexion->connect_errno)
        {
            exit("Fallo en la conexión al servidor");
        }
    return $conexion;
} 

Para mejorar el código PHP proporcionado, aquí tienes algunas sugerencias:

Separación de código de conexión y consulta:
Es buena práctica separar la conexión a la base de datos y la consulta SQL. Además, es recomendable usar funciones para reutilización y mejor organización del código.

Uso de consultas preparadas:
Para evitar inyecciones SQL y hacer el código más seguro, se deben utilizar consultas preparadas en lugar de concatenar directamente los valores en la consulta.

Mejor estructura HTML/PHP:
La forma en que se imprime la tabla puede mejorarse para ser más legible y mantener un código más limpio.

Explicación de mejoras:
Separación de estructuras HTML y PHP: Ahora el código HTML de la tabla se genera dentro de bloques PHP, lo cual hace que sea más fácil de entender y mantener.

Uso de etiquetas th para encabezados: Los encabezados de la tabla (th) se utilizan adecuadamente para mejorar la estructura semántica de la tabla.

Verificación de resultados: Se ha añadido una comprobación (mysqli_num_rows) para verificar si hay resultados antes de intentar imprimir la tabla. Esto evita que se muestre una tabla vacía si no hay datos.

Cierre de conexión: Se ha añadido mysqli_close($conexion) al final del script para asegurar que se cierre la conexión a la base de datos cuando ya no se necesite.

Manejo de errores en la conexión: El uso de or die() para manejar errores de conexión es válido, pero sería más robusto implementar un manejo de errores más detallado y específico según las necesidades del proyecto. Por ejemplo, se podrían usar bloques try-catch en conjunto con excepciones para manejar errores de conexión de manera más controlada.

Consulta preparada (opcional): Si la aplicación maneja datos sensibles o de usuarios, considera utilizar consultas preparadas (prepared statements) en lugar de la concatenación directa de valores en la consulta SQL. Esto mejora la seguridad contra inyecciones SQL.

Estilo y legibilidad del código: Se ha mejorado la legibilidad y organización del código PHP y HTML. Esto facilita la comprensión del código para futuras actualizaciones y mantenimiento por parte de otros desarrolladores.

Seguridad y buenas prácticas: Además de las mejoras mencionadas, es fundamental considerar prácticas de seguridad adicionales, como validar y escapar correctamente los datos antes de enviarlos a la base de datos. Esto ayuda a prevenir ataques de inyección SQL y asegura que los datos almacenados sean consistentes y seguros.

Optimización de consultas: Dependiendo de la complejidad de las consultas y el volumen de datos, podría ser útil optimizar las consultas SQL. Esto podría incluir el uso de índices adecuados en las tablas, limitar el número de columnas recuperadas cuando sea posible y utilizar cláusulas WHERE para filtrar resultados, entre otras técnicas.

Separación de capas: Para proyectos más grandes o complejos, considera separar la lógica de negocio (PHP) de la presentación (HTML) utilizando un patrón de diseño como MVC (Modelo-Vista-Controlador). Esto mejora la modularidad del código y facilita la escalabilidad y mantenimiento del sistema a largo plazo.

Documentación y comentarios: Asegúrate de documentar tu código de manera adecuada, incluyendo comentarios que expliquen el propósito y funcionamiento de cada sección importante. Esto no solo ayuda a otros desarrolladores que puedan trabajar en el código en el futuro, sino que también facilita tu propio trabajo cuando necesites realizar cambios o correcciones.

Validación de datos: Antes de insertar o mostrar datos en la aplicación, es crucial validarlos para asegurarse de que cumplen con los requisitos esperados. Por ejemplo, verificar que los campos obligatorios estén completos y que los formatos de datos (como direcciones de correo electrónico) sean correctos.

Usar funciones y clases: Para facilitar la reutilización y el mantenimiento del código, considera encapsular funciones y métodos en clases PHP. Esto ayuda a organizar mejor el código, promueve la reutilización de código y facilita las pruebas unitarias.

Gestión de errores robusta: Además de manejar errores de conexión, implementa un manejo robusto de errores en toda la aplicación. Utiliza bloques try-catch para capturar excepciones y manejarlas de manera adecuada. Esto mejora la experiencia del usuario final y facilita la identificación y resolución de problemas durante el desarrollo.

Seguridad de contraseñas: Si tu aplicación maneja contraseñas, asegúrate de almacenarlas de manera segura utilizando funciones de hash como password_hash() y verificarlas correctamente con password_verify(). Nunca almacenes contraseñas en texto plano en la base de datos.

Pruebas y validaciones: Antes de desplegar tu aplicación en producción, realiza pruebas exhaustivas para asegurarte de que todas las funcionalidades funcionen como se espera. Esto incluye pruebas de unidad, pruebas de integración y pruebas de seguridad para garantizar la estabilidad y seguridad de la aplicación.

Mantenimiento continuo:
Actualizaciones de seguridad: Mantén actualizados todos los componentes de tu aplicación, incluidos el servidor web, el sistema operativo, el servidor de base de datos y cualquier biblioteca de terceros que utilices. Las actualizaciones frecuentes ayudan a proteger contra vulnerabilidades conocidas.

Monitoreo y registros: Implementa mecanismos de monitoreo y registros (logs) para detectar y diagnosticar problemas rápidamente. Esto te permite realizar un seguimiento del comportamiento de la aplicación y responder rápidamente a cualquier incidente.

Implementación de patrones de diseño:
Patrón DAO (Data Access Object): Considera implementar el patrón DAO para separar la lógica de acceso a datos de la lógica de negocio. Esto facilita la gestión de la conexión a la base de datos y permite reutilizar métodos para realizar operaciones CRUD (Create, Read, Update, Delete) de manera consistente.

Patrón MVC (Modelo-Vista-Controlador): Divide tu aplicación en tres capas principales: el Modelo (donde reside la lógica de negocio y acceso a datos), la Vista (que maneja la presentación y la interacción con el usuario) y el Controlador (que actúa como intermediario que maneja las solicitudes y las respuestas). Esto promueve la separación de preocupaciones y facilita el mantenimiento y la evolución del código.

Optimización del rendimiento:
Caché de datos: Para mejorar el rendimiento de consultas frecuentes, considera implementar técnicas de caché, como almacenar en caché resultados de consultas que no cambian con frecuencia. Esto reduce la carga en la base de datos y mejora la velocidad de respuesta de la aplicación.

Optimización de consultas: Revisa las consultas SQL para asegurarte de que estén optimizadas. Utiliza índices adecuados en las tablas para mejorar la velocidad de recuperación de datos y considera el uso de cláusulas JOIN y WHERE de manera eficiente.

Seguridad avanzada:
Protección contra CSRF y XSS: Implementa medidas de seguridad para prevenir ataques de Cross-Site Request Forgery (CSRF) y Cross-Site Scripting (XSS). Usa tokens CSRF en formularios y sanitiza y valida todos los datos de entrada para evitar la ejecución de scripts maliciosos.

Seguridad en la sesión: Asegúrate de que las sesiones de usuario estén correctamente gestionadas y protegidas. Usa HTTPS para todas las comunicaciones sensibles y evita almacenar información confidencial en cookies o en la URL.

Escalabilidad y mantenimiento:
Diseño escalable: Diseña tu aplicación con escalabilidad en mente, eligiendo arquitecturas y tecnologías que puedan manejar un aumento en el volumen de usuarios y datos sin comprometer el rendimiento.

Documentación y comentarios: Continúa documentando tu código de manera exhaustiva, incluyendo comentarios que expliquen la funcionalidad y el propósito de cada parte del código. Esto facilita la colaboración con otros desarrolladores y el mantenimiento futuro de la aplicación.

 propósito principal de utilizar htmlspecialchars() en este contexto es evitar ataques de Cross-Site Scripting (XSS) al imprimir contenido dinámico en una página web.



Estas mejoras hacen que el código sea más seguro, legible y mantenible.
*/
?> 

<?php
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "crud") or die("Problemas en la conexión");

    // Consulta SQL
    $consulta = "SELECT * FROM usuarios";
    $ejecutar = mysqli_query($conexion, $consulta);

    // Verificar si hay resultados
    if (mysqli_num_rows($ejecutar) > 0) 
        {
            // Crear tabla HTML para mostrar los datos
            echo '<table border="3" bgcolor="green" align="center">';
            echo '<tr align="center">';
            echo '<th>ID</th>';
            echo '<th>Usuario</th>';
            echo '<th>Password</th>';
            echo '<th>ID Rol</th>';
            echo '<th>Email</th>';
            echo '</tr>';

            // Iterar sobre los resultados y mostrar cada fila
            while ($fila = mysqli_fetch_array($ejecutar)) 
            {
                echo '<tr align="center">';
                echo '<td>' . $fila['id'] . '</td>';
                echo '<td>' . $fila['nomusuario'] . '</td>';
                echo '<td>' . $fila['clave'] . '</td>';
                echo '<td>' . $fila['idrol'] . '</td>';
                echo '<td>' . $fila['email'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } 
    else 
        {
            echo '<p style="color: orange; font-size: 20px; text-align:center;">No se encontraron registros.</p><br>';
        }

    // Cerrar conexión
    mysqli_close($conexion);
?>











<?php
try 
    {
    $conexion=mysqli_connect("localhost","root","","crud") or die ("Problemas en la conexion");
    echo '<p style="color: green; font-size: 20px; text-align:center">¡A Caray!  Conexion Exitosa</p><br>';
 ?>

<?php
    $consulta = "SELECT id, nomusuario, clave, idrol, email FROM usuarios";
    $ejecutar=mysqli_query($conexion,$consulta);
    if (!$ejecutar) 
        {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_error($conexion));
        }
    if (mysqli_num_rows($ejecutar) > 0)
        {
?>   
            <table border="3" bgcolor="orange" align="center" style="border-color: red;">
                <tr align="center" bgcolor="red">
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th>Idrol</th>
                    <th>Email</th>
                </tr>
<?php
            while ($fila=mysqli_fetch_array($ejecutar))
                {
                    $id=      htmlspecialchars($fila['id']);
                    $usuario= htmlspecialchars($fila['nomusuario']);
                    $password=htmlspecialchars($fila['clave']);
                    $idrol=   htmlspecialchars($fila['idrol']);
                    $email=   htmlspecialchars($fila['email']);
?>
                    <tr align="center">
                        <td><?php echo $id ?></td>
                        <td><?php echo $usuario ?> </td>
                        <td><?php echo $password ?> </td>
                        <td><?php echo $idrol ?> </td>
                        <td><?php echo $email ?> </td>
                    </tr>  
<?php
                }
?>
            </table><br><br><br>
<?php
        } 
    else 
        {
            echo '<p style="color: red; font-size: 20px; font-weight: bold; text-align:center;">¡Ups! Parece que no hay registros.</p><br>';
        }
    mysqli_close($conexion);  
    } 
catch (Exception $e) 
    {
        echo "Error: " . $e->getMessage();
    }        
?>









<?php
// Intenta establecer la conexión con la base de datos
$conexion = mysqli_connect("localhost", "root", "", "crud");

// Verifica si hubo un error en la conexión
if (!$conexion) {
    die("Problemas en la conexión: " . mysqli_connect_error());
}

// Mensaje de éxito si la conexión se estableció correctamente
echo '<p style="color: green; font-size: 20px; text-align:center;">¡A caray! Conexión exitosa</p><br>';

// Consulta SQL para seleccionar todos los usuarios
$consulta = "SELECT id, nomusuario, clave, idrol, email FROM usuarios";

// Ejecuta la consulta
$ejecutar = mysqli_query($conexion, $consulta);

// Verifica si hubo errores en la ejecución de la consulta
if (!$ejecutar) {
    throw new Exception("Error al ejecutar la consulta: " . mysqli_error($conexion));
}

// Si hay resultados, muestra la tabla de usuarios
if (mysqli_num_rows($ejecutar) > 0) {
?>
    <table border="3" bgcolor="orange" align="center" style="border-color: red;">
        <tr align="center" bgcolor="red">
            <th>Id</th>
            <th>Usuario</th>
            <th>Password</th>
            <th>Idrol</th>
            <th>Email</th>
        </tr>
<?php
    // Itera sobre los resultados y muestra cada usuario en una fila de la tabla
    while ($fila = mysqli_fetch_assoc($ejecutar)) {
        $id = htmlspecialchars($fila['id']);
        $usuario = htmlspecialchars($fila['nomusuario']);
        $password = htmlspecialchars($fila['clave']);
        $idrol = htmlspecialchars($fila['idrol']);
        $email = htmlspecialchars($fila['email']);
?>
        <tr align="center">
            <td><?php echo $id ?></td>
            <td><?php echo $usuario ?></td>
            <td><?php echo $password ?></td>
            <td><?php echo $idrol ?></td>
            <td><?php echo $email ?></td>
        </tr>
<?php
    }
?>
    </table><br><br><br>
<?php
} else {
    // Mensaje si no hay registros encontrados
    echo '<p style="color: red; font-size: 20px; font-weight: bold; text-align:center;">¡Ups! Parece que no hay registros.</p><br>';
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>





<?php
// Intenta establecer la conexión con la base de datos
$conexion = mysqli_connect("localhost", "root", "", "crud");

// Verifica si hubo un error en la conexión
if (!$conexion) {
    die("Problemas en la conexión: " . mysqli_connect_error());
}

// Mensaje de éxito si la conexión se estableció correctamente
echo '<p style="color: green; font-size: 20px; text-align:center;">¡A caray! Conexión exitosa</p><br>';

// Parámetros de paginación
$registros_por_pagina = 10; // Número de registros por página
$pagina_actual = 1; // Página actual por defecto es 1

if (isset($_GET['pagina'])) {
    $pagina_actual = (int)$_GET['pagina'];
}

// Calcula el inicio para la consulta según la página actual
$inicio = ($pagina_actual - 1) * $registros_por_pagina;

// Consulta SQL con paginación
$consulta = "SELECT id, nomusuario, clave, idrol, email FROM usuarios LIMIT $inicio, $registros_por_pagina";

// Ejecuta la consulta
$ejecutar = mysqli_query($conexion, $consulta);

// Verifica si hubo errores en la ejecución de la consulta
if (!$ejecutar) {
    throw new Exception("Error al ejecutar la consulta: " . mysqli_error($conexion));
}

// Si hay resultados, muestra la tabla de usuarios
if (mysqli_num_rows($ejecutar) > 0) {
?>
    <table border="3" bgcolor="orange" align="center" style="border-color: red;">
        <tr align="center" bgcolor="red">
            <th>Id</th>
            <th>Usuario</th>
            <th>Password</th>
            <th>Idrol</th>
            <th>Email</th>
        </tr>
<?php
    // Itera sobre los resultados y muestra cada usuario en una fila de la tabla
    while ($fila = mysqli_fetch_assoc($ejecutar)) {
        $id = htmlspecialchars($fila['id']);
        $usuario = htmlspecialchars($fila['nomusuario']);
        $password = htmlspecialchars($fila['clave']);
        $idrol = htmlspecialchars($fila['idrol']);
        $email = htmlspecialchars($fila['email']);
?>
        <tr align="center">
            <td><?php echo $id ?></td>
            <td><?php echo $usuario ?></td>
            <td><?php echo $password ?></td>
            <td><?php echo $idrol ?></td>
            <td><?php echo $email ?></td>
        </tr>
<?php
    }
?>
    </table><br>

<?php
    // Calcula el número total de registros
    $consulta_total = "SELECT COUNT(*) AS total_registros FROM usuarios";
    $resultado_total = mysqli_query($conexion, $consulta_total);
    $fila_total = mysqli_fetch_assoc($resultado_total);
    $total_registros = $fila_total['total_registros'];

    // Calcula el número total de páginas
    $total_paginas = ceil($total_registros / $registros_por_pagina);

    // Muestra los enlaces de paginación
    echo '<div align="center">';
    echo '<p>Páginas:</p>';
    for ($i = 1; $i <= $total_paginas; $i++) {
        echo '<a href="?pagina=' . $i . '">' . $i . '</a> ';
    }
    echo '</div>';

} else {
    // Mensaje si no hay registros encontrados
    echo '<p style="color: red; font-size: 20px; font-weight: bold; text-align:center;">¡Ups! Parece que no hay registros.</p><br>';
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>

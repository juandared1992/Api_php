<?php
// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (aquí necesitarás tus propias credenciales)
    $servername = "localhost";
    $username = "nicolas";
    $password = "RHGTlX9I4NAg)YML";
    $dbname = "login_system";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recuperar datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // Verificar si se encontró un usuario con esas credenciales
    if ($result->num_rows == 1) {
        // Usuario autenticado, redireccionar a la página de inicio
        echo '<p style="color: green;">Autenticacion satisfactoria</p>';
    } else {
        // Usuario no autenticado, redireccionar al formulario de inicio de sesión con un mensaje de error
        echo '<p style="color: red;">Autenticacion Erronea</p>';
    }

    // Cerrar conexión
    $conn->close();
}
?>

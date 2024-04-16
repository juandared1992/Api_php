<?php
// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (debes modificar estas variables)
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
    $profile = $_POST['profile'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];

    // Consulta SQL para insertar un nuevo usuario
    $sql = "INSERT INTO `usuarios`(`profile`, `username`, `password`, `email`, `phone`, `country`) VALUES ('$profile','$username','$password','$email','$phone','$country')";
    if ($conn->query($sql) === TRUE) {
        echo '<p style="color: green;">Registro satisfactorio</p>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>
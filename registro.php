<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "exmn2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $apellidos = $_POST['apellidos'];
    $representante_nombre = $_POST['representante_nombre'];
    $representante_apellido = $_POST['representante_apellido'];
    $parentesco = $_POST['parentesco'];
    $contacto_telefonico = $_POST['contacto_telefonico'];
    $direccion_calle1 = $_POST['direccion_calle1'];
    $direccion_calle2 = $_POST['direccion_calle2'];
    $ciudad = $_POST['ciudad'];
    $estado_provincia = $_POST['estado_provincia'];
    $pais = $_POST['pais'];
    $alergias = $_POST['alergias'];
    $inmunizacion = implode(", ", $_POST['inmunizacion']);
    $hora_registro = $_POST['hora_registro'];

    $sql = "INSERT INTO pacientes (nombre, segundo_nombre, apellidos, representante_nombre, representante_apellido, parentesco, contacto_telefonico, direccion_calle1, direccion_calle2, ciudad, estado_provincia, pais, alergias, inmunizacion, hora_registro)
    VALUES ('$nombre', '$segundo_nombre', '$apellidos', '$representante_nombre', '$representante_apellido', '$parentesco', '$contacto_telefonico', '$direccion_calle1', '$direccion_calle2', '$ciudad', '$estado_provincia', '$pais', '$alergias', '$inmunizacion', '$hora_registro')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

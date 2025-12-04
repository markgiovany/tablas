<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/connection.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";
$conexion->query($query);
$mensaje = "Se agregó al usuario: " . $name;
$conexion->query("INSERT INTO logs (message) VALUES ('$mensaje')");
header('Location:./')
?>
<?php
require_once '../../lib/validate_session.php'; 
require_once '../../lib/config.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$query = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";
$conexion->query($query);
$mensaje = "Se agregó al usuario: " . $name;
$module = "Usuarios";
$conexion->query("INSERT INTO logs (message, module) VALUES ('$mensaje', '$module')");
header('Location:./')
?>
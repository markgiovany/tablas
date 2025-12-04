<?php
require_once '../../lib/validate_session.php'; 
require_once '../../lib/config.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$status = $_POST['status'];
$id = $_POST['id'];
$query = "UPDATE users SET name = '$name', phone = '$phone', email = '$email', password = '$password', status = '$status' WHERE id = $id";
$conexion->query($query);
$mensaje = "Se actualizó el usuario: " . $name;
$module = "usuarios";
$conexion->query("INSERT INTO logs (message, module) VALUES ('$mensaje', '$module')");
header('Location:./')
?>
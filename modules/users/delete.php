<?php 
require_once '../../lib/validate_session.php'; 
require_once './../../lib/config.php';

$id = $_GET['id'];
$getusers = $conexion->query("SELECT name FROM users WHERE id = $id");
$users = $getusers->fetch_assoc();
$name = $users['name'] ?? 'Desconocido';
$conexion->query("DELETE FROM users WHERE id = $id");
$mensaje = "Se eliminó al usuario: " . $name;
$module = "Usuarios";
$conexion->query("INSERT INTO logs (message, module) VALUES ('$mensaje', '$module')");
header('Location:./');
?>
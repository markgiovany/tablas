<?php 
require_once '../../lib/validate_session.php'; 
require_once './../../lib/config.php';

$id = $_GET['id'];
$getTeacher = $conexion->query("SELECT name FROM teachers WHERE id = $id");
$teacher = $getTeacher->fetch_assoc();
$name = $teacher['name'] ?? 'Desconocido';
$conexion->query("DELETE FROM teachers WHERE id = $id");
$mensaje = "Se eliminó al profesor: " . $name;
$module = "Profesores";
$conexion->query("INSERT INTO logs (message, module) VALUES ('$mensaje', '$module')");
header('Location:./');
?>
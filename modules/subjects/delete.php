<?php 
require_once '../../lib/validate_session.php'; 
require_once './../../lib/config.php';

$IDcourses = $_GET['IDcourses'];
$getCourse = $conexion->query("SELECT Name FROM courses WHERE IDcourses = $IDcourses");
$course = $getCourse->fetch_assoc();
$courseName = $course['Name'] ?? 'Curso desconocido';
$conexion->query("DELETE FROM courses WHERE IDcourses = $IDcourses");
$mensaje = "Se eliminó la materia: " . $courseName;
$module = "Materias";
$conexion->query("INSERT INTO logs (message, module) VALUES ('$mensaje', '$module')");
header('Location:./');
?>
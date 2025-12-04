<?php require_once '../../lib/validate_session.php'; 
require_once '../../lib/config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$id = $_POST['id'];
$query = "UPDATE teachers SET name='$name', email='$email', password='$password' WHERE id = $id";
$conexion -> query($query);
$mensaje = "Se actualizó al profesor: " . $name;
$module = "Profesores";
$conexion->query("INSERT INTO logs (message, module) VALUES ('$mensaje', '$module')");
header('Location: ./');
?>
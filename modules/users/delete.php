<?php require_once '../../lib/validate_session.php'; 
?>
<?php 
require_once './../../lib/connection.php';
$id = $_GET['id'];
$query = "DELETE FROM users WHERE id = $id";
$conexion->query($query);
$mensaje = "Se eliminó al usuario: " . $name;
$conexion->query("INSERT INTO logs (message) VALUES ('$mensaje')");
header('Location: ./');
?>
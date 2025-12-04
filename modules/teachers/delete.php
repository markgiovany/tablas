<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once './../../lib/config.php';
$id = $_GET['id'];
$query = "DELETE FROM teachers WHERE id = $id";
$conexion ->query($query);
$mensaje = "Se eliminó al profesor: " . $name;
$conexion->query("INSERT INTO logs (message) VALUES ('$mensaje')");
header('Location:./');

?>
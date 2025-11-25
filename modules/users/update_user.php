<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/connection.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$id = $_POST['id'];
$query = "UPDATE users SET name = '$name', phone = '$phone', email = '$email' WHERE id = $id";
$conexion->query($query);
header('Location:./')
?>
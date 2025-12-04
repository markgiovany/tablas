<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/connection.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$status = $_POST['status'];
$id = $_POST['id'];
$query = "UPDATE users SET name = '$name', phone = '$phone', email = '$email', status = '$status' WHERE id = $id";
$conexion->query($query);
header('Location:./')
?>
<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/connection.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$query = "INSERT INTO users (name, phone, email) VALUES ('$name', '$phone', '$email')";
$conexion->query($query);
header('Location:./')
?>
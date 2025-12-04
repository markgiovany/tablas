<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/connection.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$status = $_POST['status'];

$query = "INSERT INTO users (name, phone, email, password, status) VALUES ('$name', '$phone', '$email', '$password', '$status')";
$conexion->query($query);
header('Location:./')
?>
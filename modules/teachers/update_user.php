<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$id = $_POST['id'];

$query = "UPDATE teachers SET name='$name', email='$email', password='$password' WHERE id = $id";
$conexion -> query($query);
header('Location: ./');

?>
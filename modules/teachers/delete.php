<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once './../../lib/config.php';
$id = $_GET['id'];
$query = "DELETE FROM teachers WHERE id = $id";
$conexion ->query($query);
header('Location:./');

?>
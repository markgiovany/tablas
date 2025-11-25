<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once './../../lib/config.php';
$IDcourses = $_GET['IDcourses'];
$query = "DELETE FROM courses WHERE IDcourses = $IDcourses";
$conexion ->query($query);
header('Location:./');

?>
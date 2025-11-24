<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/config.php';

$Name = $_POST['Name'];
$Period = $_POST['Period'];
$Color = $_POST['Color'];
$IDcourses = $_POST['IDcourses'];

$query = "UPDATE courses SET Name='$Name', Period='$Period', Color = '$Color' WHERE IDcourses = $IDcourses";
$conexion -> query($query);
header('Location: ./');

?>
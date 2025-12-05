<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/config.php';

$Name = $_POST['Name'];
$Period = $_POST['Period'];
$Color = $_POST['Color'];
$IDcourses = $_POST['IDcourses'];
$teacher_id = $_POST['teacher_id'];

$query = "UPDATE courses SET Name='$Name', Period='$Period', Color = '$Color', teacher_id = '$teacher_id' WHERE IDcourses = $IDcourses";
$conexion -> query($query);
$mensaje = "Se actualizó la materia: " . $Name;
$module = "Materias";
$conexion->query("INSERT INTO logs (message, module) VALUES ('$mensaje', '$module')");
header('Location: ./');

?>
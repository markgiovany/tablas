<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/config.php';

$Name = $_POST['Name'];
$Period = $_POST['Period'];
$Color = $_POST['Color'];
$teacher_id = $_POST['teacher_id'];

if (empty($Name) || empty($Period) || empty($Color)) {
    echo("Pon los datos correspondientes");
 
}  

else{
    $query = "INSERT INTO courses (Name, Period, Color, teacher_id) VALUES ('$Name', '$Period', '$Color','$teacher_id')";
    $conexion -> query($query);
    $mensaje = "Se agregó la materia: " . $Name;
    $module = "Materias";
    $conexion->query("INSERT INTO logs (message, module) VALUES ('$mensaje', '$module')");
    header('Location: ./');
};


?>


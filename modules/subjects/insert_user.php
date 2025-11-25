<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/config.php';

$Name = $_POST['Name'];
$Period = $_POST['Period'];
$Color = $_POST['Color'];

if (empty($Name) || empty($Period) || empty($Color)) {
    echo("Pon los datos correspondientes");
 
}  

else{
    $query = "INSERT INTO courses (Name, Period, Color) VALUES ('$Name', '$Period', '$Color')";
    $conexion -> query($query);
    header('Location: ./');
};


?>


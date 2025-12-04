<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($name) || empty($email) || empty($password)) {
    echo("Pon los datos correspondientes");
 
}  

else{
    $query = "INSERT INTO teachers (name, email, password) VALUES ('$name', '$email', '$password')";
    $conexion -> query($query);
    $mensaje = "Se agregó al profesor: " . $name;
    $conexion->query("INSERT INTO logs (message) VALUES ('$mensaje')");
    header('Location: ./');
};


?>


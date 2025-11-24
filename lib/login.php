<?php 

if(!isset($_POST) || empty($_POST)){
    header("Location: ../");
    return false;
}


if ($_POST['emailLogin'] == "" || $_POST['passwordLogin'] == "") {
    header("Location: ../");
    return false;
}

$emailLogin = $_POST['emailLogin'];
$passwordLogin = $_POST['passwordLogin'];

require_once 'connection.php';
$query = "SELECT * FROM users WHERE email = '$emailLogin' AND password = '$passwordLogin'";
$result = $conexion->query($query);
if ($result->num_rows == 0) {
    header("Location: ../");
    return false;
}
$user = $result->fetch_object();
session_start();
$_SESSION['email'] = $emailLogin;
$_SESSION['name'] = $user->name;
header("Location: ../modules/users/");
?>
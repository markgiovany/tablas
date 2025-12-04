<?php require_once '../../lib/validate_session.php'; 
?><?php
require_once '../../lib/config.php';
$id = $_GET['id'];
$query = "SELECT * FROM teachers WHERE id = $id";
$conexion ->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-color: black;">
    
    <div class="container d-grid justify-content-center mt-5 text-center">
        <h2 style="color: white;">¿DESEAS ELIMINAR EL REGISTRO?</h2>
        <div class="row mt-5 justify-content-between text-center">
            <div class="col">
                <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-success">Si, eliminar</a>
            </div>
            <div class="col">
                <a href="../teachers/" class="btn btn-danger">No, Regresar</a>
            </div>
        </div>
    </div>

</body>
</html>
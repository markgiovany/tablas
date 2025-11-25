<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/connection.php';
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = $id";
$result = $conexion->query($query);
$row = $result->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row min-vh-100 align-items-center justify-content-center">
            <div class="col-auto text-center">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">¿Estás seguro que deseas eliminar al usuario?</h4>
                        <div class="mt-3">
                            <a href="delete.php?id=<?php echo $row->id; ?>" class="btn btn-danger">Confirmar</a>
                            <a href="./" class="btn btn-success">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
require_once '../../lib/validate_session.php';
require_once '../../lib/config.php'; 

$statusColumn = null;
$colsRes = $conexion->query("SHOW COLUMNS FROM users");
if ($colsRes) {
    while ($col = $colsRes->fetch_assoc()) {
        if ($col['Field'] === 'status') {
            $statusColumn = 'status';
            break;
        } elseif ($col['Field'] === 'estatus') {
            $statusColumn = 'estatus';
            break;
        }
    }
}
if ($statusColumn === null) {
    $statusColumn = 'status';
}

$name = $_GET['name'] ?? "";
$status = $_GET['status'] ?? "todos";

$query = "SELECT * FROM users WHERE 1=1";

if ($name !== "") {
    $name_safe = $conexion->real_escape_string($name);
    $query .= " AND name LIKE '%$name_safe%'";
}

if ($status === "1") {
    $query .= " AND $statusColumn = 1";
} elseif ($status === "0") {
    $query .= " AND $statusColumn = 0";
}

$query .= " ORDER BY id ASC";

$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

<header class="navbar sticky-top bg-primary flex-md-nowrap p-0 shadow" data-bs-theme="primary">
    <h1 class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-white pt-2 text-uppercase">
        <?php echo htmlspecialchars($_SESSION['name']); ?>
    </h1>
    <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
</header>

<div class="container-fluid">
    <div class="row">

        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Menú</h5>
                    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active bg-primary text-white rounded-4" href="../users/index.php">Usuarios</a>
                            <a class="nav-link d-flex align-items-center gap-2 mt-2 active bg-primary text-white rounded-4" href="../teachers/index.php">Profesores</a>
                            <a class="nav-link d-flex align-items-center gap-2 mt-2 active bg-primary text-white rounded-4" href="../subjects/index.php">Materias</a>
                            <a class="nav-link d-flex align-items-center gap-2 mt-2 active bg-primary text-white rounded-4" href="../logs/index.php">Registros</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-uppercase">Usuarios<a href="insert.html" class="btn btn-primary mx-2 mb-2"><i class="bi bi-journal-plus"></i></a></h1>
            </div>

            <div class="table-responsive small">

                <form method="GET" class="d-flex gap-3 mb-3">
                    <input type="text" name="name" class=" "
                           placeholder="Escribe el nombre"
                           value="<?php echo htmlspecialchars($name); ?>">

                    <select name="status" class="" onchange="this.form.submit()">
                        <option value="todos" <?php echo ($status === "todos") ? "selected" : ""; ?>>Todos</option>
                        <option value="1" <?php echo ($status === "1") ? "selected" : ""; ?>>Activos</option>
                        <option value="0" <?php echo ($status === "0") ? "selected" : ""; ?>>Inactivos</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="index.php" class="btn btn-secondary">Limpiar</a>
                </form>

                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row->id); ?></td>
                                <td><?php echo htmlspecialchars($row->name); ?></td>
                                <td><?php echo htmlspecialchars($row->phone); ?></td>
                                <td><?php echo htmlspecialchars($row->email); ?></td>
                                <td>
                                    <?php
                                    $val = null;
                                    if (isset($row->status)) $val = $row->status;
                                    elseif (isset($row->estatus)) $val = $row->estatus;
                                    echo ($val == 1) ? 'Activo' : 'Inactivo';
                                    ?>
                                </td>
                                <td>
                                    <a href="update_form.php?id=<?php echo urlencode($row->id); ?>" class="btn btn-warning"><i class="bi bi-journal-code"></i></a>
                                    <a href="confirm.php?id=<?php echo urlencode($row->id); ?>" class="btn btn-danger"><i class="bi bi-journal-minus"></i>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No se encontraron registros</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </main>

    </div>
</div>

</body>
</html>

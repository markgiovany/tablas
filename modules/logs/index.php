<?php require_once '../../lib/validate_session.php'; 
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <header class="navbar sticky-top bg-primary flex-md-nowrap p-0 shadow" data-bs-theme="primary">
        <h1 class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-white pt-2 text-uppercase"><?php echo $_SESSION['name']; ?></h1>
        <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5> <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item"> 
                                <a class="nav-link d-flex align-items-center gap-2  active bg-primary text-white rounded-4" aria-current="page" href="../users/index.php">
                                    Usuarios
                                </a>
                                <a class="nav-link d-flex align-items-center gap-2 mt-2 active bg-primary text-white rounded-4" aria-current="page" href="../teachers/index.php"> 
                                    Profesores
                                </a>
                                <a class="nav-link d-flex align-items-center gap-2 mt-2 active bg-primary text-white rounded-4" aria-current="page" href="../subjects/index.php"> 
                                    Materias
                                </a>
                                <a class="nav-link d-flex align-items-center gap-2 mt-2 active bg-primary text-white rounded-4" aria-current="page" href="../logs/index.php"> 
                                    Registros
                                </a>  
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 text-uppercase">Registro</h1>
                </div>
                <div class="table-responsive small">
                    <form method="GET" >
                        <select name="module" class="form-select w-auto mb-3" onchange="this.form.submit()">
                            <option value="todos" <?= $module === "todos" ? "selected" : "" ?>>Todos</option>
                            <option value="usuarios" <?= $module === "usuarios" ? "selected" : "" ?>>Usuarios</option>
                            <option value="profesores" <?= $module === "profesores" ? "selected" : "" ?>>Profesores</option>
                            <option value="materias" <?= $module === "materias" ? "selected" : "" ?>>Materias</option>
                        </select>
                    </form>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mensaje</th>
                                <th scope="col">Módulo</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        require_once '../../lib/config.php';

                        $module = isset($_GET['module']) ? $_GET['module'] : 'todos';

                        // Construir la consulta según el filtro
                        if($module == 'todos'){
                            $query = "SELECT * FROM logs ORDER BY inserted_at DESC";
                        } else {
                            $query = "SELECT * FROM logs WHERE module = '$module' ORDER BY inserted_at DESC";
                        }

                        $result = $conexion->query($query);

                        if($result->num_rows == 0){
                        ?> 
                        <tr>
                            <td colspan="4">No se encuentran registros</td>
                        </tr>
                        <?php
                        } else {
                            while ($row = $result->fetch_object()){
                        ?>
                        <tr> 
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->message; ?></td>
                            <td><?php echo $row->module; ?></td>
                            <td><?php echo $row->inserted_at; ?></td>
                        </tr>
                        <?php
                            }
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
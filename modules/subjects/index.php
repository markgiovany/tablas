<?php require_once '../../lib/validate_session.php'; 
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <header class="navbar sticky-top bg-primary flex-md-nowrap p-0 shadow" data-bs-theme="primary">
        <h1 class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-white pt-2 text-uppercase">
            <?php echo $_SESSION['name']; ?>
        </h1>
        <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
    </header>

    <div class="container-fluid">
        <div class="row">

            
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title">Company name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>

                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item"> 
                                <a class="nav-link d-flex align-items-center gap-2 active bg-primary text-white rounded-4" href="../users/index.php">
                                    Usuarios
                                </a>
                                <a class="nav-link d-flex align-items-center gap-2 mt-2 active bg-primary text-white rounded-4" href="../teachers/index.php"> 
                                    Profesores
                                </a>
                                <a class="nav-link d-flex align-items-center gap-2 mt-2 active bg-primary text-white rounded-4" href="../subjects/index.php"> 
                                    Materias
                                </a>
                                <a class="nav-link d-flex align-items-center gap-2 mt-2 active bg-primary text-white rounded-4" href="../logs/index.php"> 
                                    Registros
                                </a>  
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 text-uppercase">Materias<a href="insert.php" class="btn btn-primary mx-2 mb-2"><i class="bi bi-journal-plus"></i></a></h1>
                </div>
                <form method="GET">
                    <select name="teacher_filter" id="teacher_filter" 
                            class="form-select w-auto mb-3" onchange="this.form.submit()">

                        <option value="">Todos</option>

                        <?php
                        require_once '../../lib/config.php';

                        $query_teachers = "SELECT id, name FROM teachers ORDER BY name ASC";
                        $result_teachers = $conexion->query($query_teachers);

                        $selected = isset($_GET['teacher_filter']) ? $_GET['teacher_filter'] : "";

                        while ($t = $result_teachers->fetch_object()) {
                            $isSelected = ($selected == $t->id) ? "selected" : "";
                            echo "<option value='{$t->id}' $isSelected>{$t->name}</option>";
                        }
                        ?>
                    </select>
                </form>

                <div class="table-responsive small">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Maestro</th>
                                <th>Cuatrimestre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        require_once '../../lib/config.php';

                        $filter = "";
                        if (isset($_GET['teacher_filter']) && $_GET['teacher_filter'] !== "") {
                            $teacher_id = intval($_GET['teacher_filter']);
                            $filter = " WHERE courses.teacher_id = $teacher_id ";
                        }

                        $query = "SELECT courses.*, teachers.name AS teacher_name 
                                  FROM courses 
                                  INNER JOIN teachers ON teachers.id = courses.teacher_id
                                  $filter
                                  ORDER BY courses.IDcourses DESC";

                        $result = $conexion->query($query);

                        if ($result->num_rows == 0) {
                        ?> 
                            <tr>
                                <td colspan="5" class="text-center">No se encuentran registros</td>
                            </tr>
                        <?php
                        }

                        while ($row = $result->fetch_object()) {
                        ?>
                            <tr> 
                                <td class="d-flex align-items-center gap-2">
                                    <span class="color_course" style="background: <?php echo $row->Color; ?>"></span>
                                    <?php echo $row->IDcourses; ?>
                                </td>

                                <td>
                                    <?php echo $row->Name; ?>
                                </td>

                                <td>
                                    <?php echo $row->teacher_name; ?>
                                </td>

                                <td>
                                    <?php echo $row->Period; ?>
                                </td>

                                <td>
                                    <a href="update_form.php?IDcourses=<?php echo $row->IDcourses; ?>" class="btn btn-warning">
                                        <i class="bi bi-journal-code"></i>
                                    </a>

                                    <a href="confirm.php?IDcourses=<?php echo $row->IDcourses; ?>" class="btn btn-danger">
                                        <i class="bi bi-journal-minus"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
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
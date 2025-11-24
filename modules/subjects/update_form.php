<?php require_once '../../lib/validate_session.php'; 
?>
<?php
require_once '../../lib/config.php';

$IDcourses = $_GET['IDcourses'];
$query = "SELECT * FROM courses WHERE IDcourses = $IDcourses";
$result = $conexion -> query($query);
$record = $result ->fetch_object();

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
    <h1 class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-3 text-white pt-2 ">Materias</h1>
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
                                <a class="nav-link d-flex align-items-center gap-2 active bg-primary text-white rounded-4" aria-current="page" href="../subjects/"> 
                                    Materias
                                </a> 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                 
                    <h1 class="h2 text-uppercase">Editar Materia </h1>
                
                </div>
               
                <div class="form">
                    <form action="update_user.php" method="post">

                        <div class="mb-3">
                            <label for="" class="form-label">Nombre</label>
                            <input type="text" class="form-control form-control-md" placeholder="Escribe el Nombre" name="Name" value="<?php echo $record-> Name;?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Cuatrimestre</label>
                            <input type="text" class="form-control form-control-md" placeholder="Escribe el Cuatrimestre" name="Period" value="<?php echo $record-> Period;?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Color</label>
                            <input type="text" class="form-control form-control-md" placeholder="Escribe el Color" name="Color" value="<?php echo $record-> Color;?>">
                            <input type="hidden" name="IDcourses" value="<?php echo $IDcourses;?>">
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-success btn-lg" value="Editar">
                            <a href="../subjects/" class="btn btn-danger btn-lg">Regresar</a>
                        </div>

                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/mantenimiento.css">
    <title>Ganado</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mantenimiento</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Ganado
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Alimentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Establos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clientes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="contenido-principal">
        <section class="tabla">
            <div class="card border-primary mb-3">
                <div class="card-header">Tabla</div>
                <div class="card-body">
                    <h4 class="card-title">Ganado</h4>
                    <table class="table table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Nacimiento</th>
                            <th>Imagen</th>
                        </tr>
                        <?php
                        @include("../php/conexion.php");
                        if ($conexion) {
                            $sql = "SELECT * FROM ganado";
                            $resultado = mysqli_query($conexion, $sql);
                            // Necesito que me itere sobre los datos de la consulte y me imprima en la lista.
                            // <li><a class="dropdown-item">Action</a></li>
                            while ($vaca = mysqli_fetch_assoc($resultado)) {
                              echo "<tr>";
                              echo "<td>{$vaca['nombre']}</td>";
                              echo "<td>{$vaca['fecha_nacimiento']}</td>";
                              echo "<td class='row-image text-center'>";
                              echo "<img src='{$vaca['imagen']}'>";
                              echo "</td>";
                              echo "</tr>";
                            }
                          }
                        ?>
                    </table>
                </div>
            </div>
        </section>
        <section class="tipo-ganado">
            <div class="card border-primary mb-3">
                <div class="card-header">Razas</div>
                <div class="card-body">Hola</div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
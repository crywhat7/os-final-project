<!DOCTYPE html>
<html>

<head>
  <title>Tienda</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="./index.html">MAAK</a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="./index.html" aria-current="page">¿Quienes somos?
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">Tienda</a>
          </li>
        </ul>
      </div>
      <!-- Al final de todo, un icono -->
      <div class="d-flex">
        <a href="cart.html" class="text-decoration-none">
          <i class="fas fa-shopping-cart text-white icon-carrito">
            - 0
          </i>
        </a>
      </div>
    </div>
  </nav>
  <main>
    <!-- TOAST -->
    <div class="toast-container position-fixed top-0 end-0 p-3">
      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      </div>
    </div>
    <!-- END TOAST -->
    <!-- Lista de Productos a la venta -->
    <div class="container mt-4">
      <div class="row">
        <div class="lista-productos">
            <?php
              @include("../php/conexion.php");
              if ($conexion) {
                $sql = "SELECT * FROM productos p LEFT JOIN tipo_producto tp ON tp.id_tipo = p.tipo_producto";
                $resultado = mysqli_query($conexion, $sql);
                // Necesito que me itere sobre los datos de la consulte y me imprima en la lista.
                // <li><a class="dropdown-item">Action</a></li>
                while ($producto = mysqli_fetch_assoc($resultado)) {
                  echo <<<HTML
                     <div class="card">
                      <img src="{$producto['imagen']}" class="card-img-top">
                      <div class="card-body">
                        <h5 class="card-title">{$producto['nombre_producto']}</h5>
                        <p class="card-text">
                          <small class="text-muted">
                          Precio: {$producto['precio']} Lps
                        </small>
                      </p>
                      </div>
                      <div class="card-footer">
                        <button class="btn btn-primary" onclick="agregarAlCarrito({$producto['codigo_producto']}, '{$producto['nombre_producto']}', {$producto['precio']}, '{$producto['imagen']}')">Comprar</button>
                      </div>
                    </div>
                    HTML;
                }
              }
            ?>
        </div>
      </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ef2430d1e3.js" crossorigin="anonymous"></script>
  <script src="./js/store.js"></script>
</body>

</html>
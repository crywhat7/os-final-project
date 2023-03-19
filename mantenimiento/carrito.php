<!DOCTYPE html>
<html>

<head>
    <title>Carrito de compras</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <a class="nav-link active">Ganado
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./alimentos.php">Alimentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./establos.php">Establos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./productos.php">Productos</a>
                    </li>
                </ul>
            </div>

        </div>
        <button id="resumen-btn" class="btn btn-primary btn-block"><i class="fa-solid fa-cart-shopping"></i></button>

    </nav>
    <div class="container">
        <h1 class="title-style">Carrito de compras</h1>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Vaca1</td>
                            <td>2</td>
                            <td>$50.00</td>
                            <td>$100.00</td>
                            <td><button class="btn btn-sm btn-danger">Eliminar</button></td>
                        </tr>
                        <tr>
                            <td>Vaca2</td>
                            <td>3</td>
                            <td>$20.00</td>
                            <td>$60.00</td>
                            <td><button class="btn btn-sm btn-danger">Eliminar</button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" align="right"><strong>Total:</strong></td>
                            <td>$160.00</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-4">
                <!--
                <div id="resumen" class="col-md-4" style="display: none;">
-->
                <h3>Resumen de compra</h3>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Subtotal
                        <span>$160.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Envío
                        <span>$0.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total
                        <span class="badge badge-pill badge-success">$160.00</span>
                    </li>
                </ul>
                <button class="btn btn-primary btn-block">Finalizar compra</button>
            </div>
        </div>
    </div>
    </div>
    <!--
    <script src="../js/scripts.js"></script>
-->
</body>

</html>
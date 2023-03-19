limpiarCarrito = () => {
    let carrito = JSON.parse(localStorage.getItem('productosCarrito'));
    carrito = [];
    localStorage.setItem('productosCarrito', JSON.stringify(carrito));
    window.location.href = './buy.php';
}
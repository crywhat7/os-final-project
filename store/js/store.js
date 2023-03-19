const toastLiveExample = document.getElementById('liveToast');
let productosCarrito = JSON.parse(localStorage.getItem('productosCarrito')) || [];
let cantidadCarrito;
const usuario = JSON.parse(sessionStorage.getItem('data-user')) || {};
console.log(usuario);

actualizarBadgeCarrito = () => {
    const badgeCarrito = document.querySelector('.icon-carrito');
    cantidadCarrito = productosCarrito.reduce((acc, producto) => acc + producto.cantidad, 0);
    badgeCarrito.innerHTML = `  (${cantidadCarrito})`;
};

const agregarAlCarrito = (id, nombre, precio, imagen) => {
    const producto = {
        id,
        nombre,
        precio,
        imagen,
        cantidad: 1
    }
    // Si el producto ya existe en el carrito, solo se aumenta la cantidad
    const existe = productosCarrito.some(producto => producto.id === id);
    if (existe) {
        productosCarrito.forEach(producto => {
            if (producto.id === id) {
                producto.cantidad++;
            }
        });
    } else {
        // Si el producto no existe en el carrito, se agrega al carrito
        productosCarrito.push(producto);
    }

    // Se actualiza el carrito en el localStorage
    localStorage.setItem('productosCarrito', JSON.stringify(productosCarrito));
    actualizarBadgeCarrito();

    toastLiveExample.innerHTML = `
        <div class="toast-header">
            <img src="${producto.imagen}" class="rounded me-2" style="width: 1rem">
            <strong class="me-auto">Producto agregado al carrito</strong>
            <small>Justo ahora</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Se agregó ${producto.nombre} al carrito
        </div>
    `;
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show();
    setTimeout(() => {
        toast.hide();
    }, 1500);
}

actualizarBadgeCarrito();
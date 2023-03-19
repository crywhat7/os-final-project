const carritoTableBody = document.querySelector('.carrito-table-body');
const productosCarrito = JSON.parse(localStorage.getItem('productosCarrito')) || [];
const total = document.querySelector('.gran-total');
const resumen = {
    subtotal: document.querySelector('.resumen-subtotal'),
    impuesto: document.querySelector('.resumen-impuesto'),
    total: document.querySelector('.resumen-total')
}

const renderizarCarrito = () => {
    carritoTableBody.innerHTML = '';
    productosCarrito.forEach(producto => {
        carritoTableBody.innerHTML += `
            <tr>
                <td class="text-center">
                    <img src="${producto.imagen}" alt="${producto.nombre}" style="max-width: 100px; max-height: 100px; object-fit:cover;">
                </td>
                <td>${producto.nombre}</td>
                <td>${producto.cantidad}</td>
                <td>L ${producto.precio}</td>
                <td>L ${producto.cantidad * producto.precio}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${producto.id})">Eliminar</button>
                </td>
            </tr>
        `;
    });
    const totalCarrito = productosCarrito.reduce((acc, producto) => acc + producto.cantidad * producto.precio, 0);
    total.innerHTML = `L ${totalCarrito}`;
    resumen.subtotal.innerHTML = `L ${totalCarrito}`;
    resumen.impuesto.innerHTML = `L ${Math.round(totalCarrito * 0.15 * 100) / 100}`;
    resumen.total.innerHTML = `L ${Math.round(totalCarrito * 1.15 * 100) / 100}`;
    
};

const eliminarProducto = (id) => {
    const producto = productosCarrito.find(producto => producto.id === id);
    const index = productosCarrito.indexOf(producto);
    productosCarrito.splice(index, 1);
    localStorage.setItem('productosCarrito', JSON.stringify(productosCarrito));
    renderizarCarrito();
};

// console.log(carritoTableBody);
renderizarCarrito();

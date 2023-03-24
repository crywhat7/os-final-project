const carritoTableBody = document.querySelector('.carrito-table-body');
const productosCarrito = JSON.parse(localStorage.getItem('productosCarrito')) || [];
const total = document.querySelector('.gran-total');
const resumen = {
    subtotal: document.querySelector('.resumen-subtotal'),
    impuesto: document.querySelector('.resumen-impuesto'),
    total: document.querySelector('.resumen-total')
}

const renderizarCarrito = () => {
    if (!carritoTableBody) return;
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

const comprar = () => {
    const { codigo_cliente } = JSON.parse(sessionStorage.getItem('data-user'));
    const fechaFactura = new Date().toISOString().split('T')[0];
    let valuesVentas = '';
    productosCarrito.forEach(producto => {
        valuesVentas += `(${producto.id}, ${codigo_cliente}, ::codigo_factura, ${producto.cantidad}, ${producto.precio}, ${producto.cantidad * producto.precio}, '${fechaFactura}'),`;
    });
    // Quitar la ultima coma y cambiarla por punto y coma
    valuesVentas = valuesVentas.slice(0, -1) + ';';

    sql_insertar_factura = `INSERT INTO facturas (codigo_cliente, subtotal, impuesto, total, fecha_factura) VALUES (${codigo_cliente}, 0, 0, 0, '${fechaFactura}');`;

    sql_insertar_ventas = `INSERT INTO ventas (codigo_producto, codigo_cliente, codigo_factura, cantidad, precio, total, fecha_venta)
    VALUES
    ${valuesVentas}`;

    // Crear un formulario para enviar los datos
    const form = document.createElement('form');
    const inputFactura = document.createElement('input');
    const inputVentas = document.createElement('input');

    inputFactura.setAttribute('name', 'sql_insertar_factura');
    inputFactura.setAttribute('value', sql_insertar_factura);
    inputFactura.setAttribute('type', 'hidden');

    inputVentas.setAttribute('name', 'sql_insertar_ventas');
    inputVentas.setAttribute('value', sql_insertar_ventas);
    inputVentas.setAttribute('type', 'hidden');

    form.appendChild(inputFactura);
    form.appendChild(inputVentas);

    form.setAttribute('method', 'post');
    form.setAttribute('action', './php/enviar-carrito.php');

    document.body.appendChild(form);

    form.submit();
    // console.log(sql);

};
// console.log(carritoTableBody);
renderizarCarrito();

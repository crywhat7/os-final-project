enviarFormularioGanado = () => {
    const formulario = document.getElementById('formulario-new-vaca');
    // Enviar datos
    // Ejecutar el submit del formulario
    formulario.submit();
}

deleteElement = (tipo, id) => {
    const formulario = document.createElement('form');
    const inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'codigo';
    inputId.value = id;

    let url;
    switch (tipo) {
        case 'vaca':
            url = '../php/delete-ganado.php';
            break;
        case 'alimento':
            url = '../php/delete-alimento.php';
            break;
        case 'establo':
            url = '../php/delete-establo.php';
            break;
        case 'producto':
            url = '../php/delete-producto.php';
            break;
        default:
            break;
    }

    formulario.action = url;
    formulario.method = 'POST';
    formulario.style.display = 'none';

    formulario.appendChild(inputId);
    document.body.appendChild(formulario);
    formulario.submit();

    // Eliminar el formulario
    document.body.removeChild(formulario);
}
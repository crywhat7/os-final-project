document.addEventListener('DOMContentLoaded', () => {
    const opcionMantenimiento = document.querySelector('.mantenimiento-link');
    const { esAdmin } = JSON.parse(sessionStorage.getItem('data-user')) || {esAdmin: false};
    console.log(esAdmin)
    if (esAdmin) {
        opcionMantenimiento?.classList.remove('d-none');
    }
});
var resumenBtn = document.getElementById("resumen-btn");
var resumen = document.getElementById("resumen");

resumenBtn.addEventListener("click", function () {
  if (resumen.style.display === "none") {
    resumen.style.display = "block";
    resumenBtn.textContent = "Ocultar resumen de compra";
    alert("Paso esto 1");
  } else {
    resumen.style.display = "none";
    resumenBtn.textContent = "Mostrar resumen de compra";
    alert("Paso esto 2");
  }
});

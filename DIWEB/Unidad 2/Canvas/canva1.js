// Comprobar que encontramos un elemento y podemos extraer su contexto

function cargaContextoCanvas(IdCanvas) {
  let elemento = document.getElementById(IdCanvas);
  if (elemento && elemento.getContext) {
    let contexto = elemento.getContext("2d");
    if (contexto) {
      return contexto;
    }
  }
  return false;
}

window.addEventListener("DOMContentLoaded", () => {
  let contexto = cargaContextoCanvas("micanvas");
  if (contexto) {
    contexto.fillStyle = "#663442";
    contexto.fillRect(100, 100, 50, 50);
    contexto.fillStyle = "#663442";
    contexto.fillRect(200, 200, 10, 10);
  }
});

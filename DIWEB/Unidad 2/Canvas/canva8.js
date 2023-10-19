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
    let img = new Image();
    img.src = '';
  }
});

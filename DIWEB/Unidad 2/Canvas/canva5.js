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
    contexto.beginPath();
    contexto.moveTo(1, 1);
    for (let i = 1; i <= 440; i += 11) {
      if (i % 2 != 0) {
        contexto.lineTo(i + 11, i);
      } else {
        contexto.lineTo(i, i + 11);
      }
    }
    contexto.lineTo(1, 440);
    contexto.fill();
  }
});

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
    contexto.arc(75, 75, 60, Math.PI, Math.PI * 0.5, false);
    contexto.arc(75, 75, 40, Math.PI * 0.5, Math.PI, false);
    contexto.closePath();
    contexto.fill();

    contexto.beginPath();
    contexto.fillStyle = "orange";
    contexto.arc(75, 75, 15, 0, Math.PI * 2, false);
    contexto.fill();

    contexto.beginPath();
    contexto.fillStyle = "yellow";
    contexto.arc(250, 250, 60, Math.PI * 0.25, Math.PI * 1.75, false);
    contexto.lineTo(250,250);
    contexto.closePath();
    contexto.fill();
    contexto.stroke();

    contexto.fillStyle = "black";
    contexto.fillRect(225,217,6,6)
  }
});

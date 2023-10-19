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
    //rombo1
    contexto.fillStyle = "#FF0000"
    contexto.beginPath();
    contexto.moveTo(50,5);
    contexto.lineTo(75,65);
    contexto.lineTo(50,125);
    contexto.lineTo(25,65);
    contexto.fill();

    //rombo2
    contexto.fillStyle = "rgba(255,0,0,0.2)"
    contexto.beginPath();
    contexto.moveTo(70,5);
    contexto.lineTo(100,65);
    contexto.lineTo(75,125);
    contexto.lineTo(50,65);
    contexto.fill();
  }
});


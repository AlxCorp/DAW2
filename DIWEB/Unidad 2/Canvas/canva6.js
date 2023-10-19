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
  let contexto1 = cargaContextoCanvas("micanvas1");
  if (contexto1) {
    //Camino relleno sin cierre explícito
    contexto1.beginPath();
    contexto1.moveTo(50, 15);
    contexto1.lineTo(112, 15);
    contexto1.lineTo(143, 69);
    contexto1.lineTo(112, 123);
    contexto1.lineTo(50, 123);
    contexto1.lineTo(19, 69);
    contexto1.fill();
  }

  let contexto2 = cargaContextoCanvas("micanvas2");
  if (contexto2) {
    //Camino relleno sin cierre explícito
    contexto2.beginPath();
    contexto2.moveTo(50, 15);
    contexto2.lineTo(112, 15);
    contexto2.lineTo(143, 69);
    contexto2.lineTo(112, 123);
    contexto2.lineTo(50, 123);
    contexto2.lineTo(19, 69);
    contexto2.fill();
  }

  let contexto3 = cargaContextoCanvas("micanvas3");
  if (contexto3) {
    //Camino relleno sin cierre explícito
    contexto3.beginPath();
    contexto3.moveTo(50, 15);
    contexto3.lineTo(112, 15);
    contexto3.lineTo(143, 69);
    contexto3.lineTo(112, 123);
    contexto3.lineTo(50, 123);
    contexto3.lineTo(19, 69);
    contexto3.stroke();
  }
});

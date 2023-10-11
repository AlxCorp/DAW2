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
    contexto.fillStyle = "rgba(255,0,0,0.5)";
    for (let i = 0; i <= 500; i += 10) {
      contexto.fillRect(i, i, 10, 10);
    }
    contexto.fillStyle = "rgba(70%, 50%, 20%, 0.5)";
    for (let i = 500; i >= 0; i -= 10) {
      contexto.fillRect(i, 500 - i, 10, 10);
    }
    contexto.fillStyle = "rgba(100, 255, 40, 0.8)";
    for (let i = 0; i <= 500; i += 20) {
      contexto.fillRect(250, 500 - i, 10, 10);
    }
    contexto.fillStyle = "rgba(230, 60, 183, 0.3)";
    for (let i = 0; i <= 500; i += 20) {
      contexto.fillRect(i, 250, 10, 10);
    }
    document.getElementById('borrar').addEventListener('click', borradoParcial);
  }
});

function borradoParcial() {
  let contexto = cargaContextoCanvas("micanvas");
  if (contexto) {
    contexto.clearRect(60, 0, 400, 400);
  }
}

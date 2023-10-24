const canvas = document.getElementById('dominoCanvas');
const ctx = canvas.getContext('2d');

const dominoes = [];
const dominoWidth = 30;
const dominoHeight = 60;
const spaceBetweenDominoes = 10;

// Crear fichas de dominó
for(let i = 0; i < 10; i++) {
    dominoes.push({
        x: i * (dominoWidth + spaceBetweenDominoes) + dominoWidth, 
        y: canvas.height - dominoHeight,
        angle: 0,
        falling: false
    });
}

// Función para dibujar las fichas de dominó
function drawDominoes() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    dominoes.forEach((domino, index) => {
        ctx.save();
        ctx.translate(domino.x, domino.y + dominoHeight);
        ctx.rotate(domino.angle);
        ctx.fillRect(-dominoWidth, -dominoHeight, dominoWidth, dominoHeight);
        ctx.restore();

        // Si es el primer dominó y aún no ha comenzado a caer, iniciar la caída
        if(index === 0 && domino.angle === 0) {
            domino.falling = true;
        }

        // Si el dominó anterior está cayendo y su ángulo es mayor que 0.4 radianes, hacer que este dominó comience a caer
        if(index > 0 && dominoes[index - 1].falling && dominoes[index - 1].angle > 0.4) {
            domino.falling = true;
        }

        if(domino.falling && domino.angle < Math.PI / 2) {
            domino.angle += 0.02;
        }
    });

    requestAnimationFrame(drawDominoes);
}

drawDominoes();
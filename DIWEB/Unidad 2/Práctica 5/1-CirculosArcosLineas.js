const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');

function drawConnectedArcs(x, y, radius, numberOfArcs) {
    // Dibuja círculos y líneas conectándolos
    let angleStep = (Math.PI * 2) / numberOfArcs;
    for (let i = 0; i < numberOfArcs; i++) {
        let angle = i * angleStep;
        let circleX = x + Math.cos(angle) * radius;
        let circleY = y + Math.sin(angle) * radius;

        // Dibuja el círculo externo
        ctx.beginPath();
        ctx.arc(circleX, circleY, 40, 0, Math.PI * 2);
        ctx.stroke();

        // Dibuja el arco dentro de cada círculo
        ctx.beginPath();
        ctx.arc(circleX, circleY, 20, 0, Math.PI);
        ctx.stroke();

        // Dibuja líneas conectando los círculos
        if (i > 0) {
            ctx.beginPath();
            ctx.moveTo(circleX, circleY);
            let prevX = x + Math.cos(angle - angleStep) * radius;
            let prevY = y + Math.sin(angle - angleStep) * radius;
            ctx.lineTo(prevX, prevY);
            ctx.stroke();
        }
    }

    // Conecta el último círculo con el primero
    ctx.beginPath();
    let firstX = x + Math.cos(0) * radius;
    let firstY = y + Math.sin(0) * radius;
    ctx.moveTo(firstX, firstY);
    let lastX = x + Math.cos((numberOfArcs - 1) * angleStep) * radius;
    let lastY = y + Math.sin((numberOfArcs - 1) * angleStep) * radius;
    ctx.lineTo(lastX, lastY);
    ctx.stroke();
}

drawConnectedArcs(300, 300, 200, 6);

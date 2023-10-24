const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

function drawStar(x, y, spikes, outerRadius, innerRadius) {
    ctx.beginPath();
    let rotation = Math.PI / 2 * 3;
    let angle = Math.PI / spikes;
    ctx.moveTo(x, y - outerRadius);

    for (let i = 0; i < spikes; i++) {
        x = x + Math.cos(rotation) * outerRadius;
        y = y + Math.sin(rotation) * outerRadius;
        ctx.lineTo(x, y);
        rotation = rotation + angle;

        x = x + Math.cos(rotation) * innerRadius;
        y = y + Math.sin(rotation) * innerRadius;
        ctx.lineTo(x, y);
        rotation = rotation + angle;
    }

    ctx.closePath();
    ctx.lineWidth = 5;
    ctx.strokeStyle = '#000';
    ctx.stroke();
}

function applyGradient(x, y, radius) {
    const gradient = ctx.createRadialGradient(x, y, 0, x, y, radius);
    gradient.addColorStop(0, '#f00');
    gradient.addColorStop(0.5, '#ff0');
    gradient.addColorStop(1, '#00f');
    ctx.fillStyle = gradient;
    ctx.fill();
}

function drawText(x, y, text) {
    ctx.font = '32px Arial';
    ctx.fillStyle = '#000';
    ctx.textAlign = 'center';
    ctx.fillText(text, x, y);
}

drawStar(200, 200, 5, 100, 50);
applyGradient(200, 200, 100);

drawText(200, 400, 'Sol las tres y cuarto');

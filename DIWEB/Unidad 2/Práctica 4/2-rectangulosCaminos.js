const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');

function drawCustomRectangle(x, y, width, height, color) {
    ctx.strokeStyle = color;
    ctx.strokeRect(x, y, width, height);

    ctx.beginPath();
    ctx.moveTo(x, y);
    ctx.lineTo(x + width, y + height);
    ctx.moveTo(x + width, y);
    ctx.lineTo(x, y + height);
    ctx.stroke();

    const centerX = x + width / 2;
    const centerY = y + height / 2;
    const radius = Math.min(width, height) / 4;

    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, 0, Math.PI * 2);
    ctx.stroke();
}

drawCustomRectangle(50, 50, 200, 100, 'red');
drawCustomRectangle(100, 200, 150, 150, 'blue');

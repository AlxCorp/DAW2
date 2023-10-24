const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

window.onload = function () {
    const img = new Image();
    img.onload = function () {
        // Calcula las coordenadas para recortar una porción central
        const cropWidth = 200;  // Ancho deseado del recorte
        const cropHeight = 200; // Altura deseada del recorte
        const cropX = (img.width - cropWidth) / 2;
        const cropY = (img.height - cropHeight) / 2;
        
        // Recortar la porción central y dibujar en el canvas
        ctx.drawImage(img, cropX, cropY, cropWidth, cropHeight, 0, 0, canvas.width, canvas.height);
    }
    
    img.src = 'image.webp';
}

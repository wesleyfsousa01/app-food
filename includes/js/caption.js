// Função para ajustar a posição vertical do carousel-caption dinamicamente
function ajustarPosicaoCaption() {
    // Seleciona o carousel-caption
    const carouselCaption = document.querySelector('.carousel-caption');

    // Calcula a altura do carousel-caption
    const captionHeight = carouselCaption.offsetHeight;

    // Calcula a altura disponível na tela (altura da janela do navegador)
    const windowHeight = window.innerHeight;

    // Calcula a posição vertical ajustada
    const topPosition = Math.max(0, (windowHeight - captionHeight) / 3);

    // Define a posição vertical do carousel-caption
    carouselCaption.style.top = topPosition + 'px';
}

// Chama a função para ajustar a posição do carousel-caption quando a página é carregada e redimensionada
window.addEventListener('DOMContentLoaded', ajustarPosicaoCaption);
window.addEventListener('resize', ajustarPosicaoCaption);
//Escutador de Eventos
// Espera o DOM ser completamente carregado antes de executar o código
document.addEventListener("DOMContentLoaded", function() {
    // Seleciona todos os itens do carousel
    const carouselItems = document.querySelectorAll('.carousel-item');

    // Função para animar um elemento com base em sua visibilidade na tela
    const animateElement = (element, visibility) => {
        // Define a quantidade de rolagem necessária para que o elemento seja considerado visível
        const offset = window.innerHeight * 0.9;
        // Calcula a distância do elemento ao topo da janela de visualização
        const distanceFromTop = element.getBoundingClientRect().top + window.scrollY;
        // Calcula a opacidade do elemento com base na distância do topo
        const opacity = Math.max(0, Math.min(1, 3 - (distanceFromTop - offset) / offset));
        // Define a opacidade e adiciona ou remove a classe 'show' com base na visibilidade
        element.style.opacity = visibility && opacity > .5 ? opacity : 0;
        element.classList.toggle('show', visibility && opacity > .5);
    };

    // Função para verificar a visibilidade dos elementos do carousel
    const checkVisibility = () => {
        // Itera sobre todos os itens do carousel
        carouselItems.forEach(carouselItem => {
            // Verifica se o item está pelo menos 50% visível na tela
            const isVisible = carouselItem.getBoundingClientRect().top < window.innerHeight / 2 && carouselItem.getBoundingClientRect().bottom > 0;
            // Seleciona todos os elementos animados dentro do item do carousel
            carouselItem.querySelectorAll('.animated').forEach(animatedElement => {
                // Chama a função para animar o elemento com base na sua visibilidade
                animateElement(animatedElement, isVisible);
            });
        });
    };

    // Função para lidar com a mudança de slide no carousel
    const handleSlideChange = () => {
        // Verifica a visibilidade dos elementos do carousel após a mudança de slide
        checkVisibility();
    };

    // Função para lidar com a rolagem da página
    const handleScroll = () => {
        // Verifica a visibilidade dos elementos do carousel durante a rolagem da página
        checkVisibility();
    };

    // Adiciona event listeners para verificar a visibilidade dos elementos em diferentes eventos
    window.addEventListener('load', checkVisibility); // Quando a página é carregada
    window.addEventListener('scroll', handleScroll); // Quando a página é rolada
    window.addEventListener('resize', checkVisibility); // Quando a janela é redimensionada

    // Adiciona event listeners para lidar com a mudança de slide no carousel
    document.querySelector('.carousel').addEventListener('slid.bs.carousel', handleSlideChange);
    document.querySelector('.carousel').addEventListener('slide.bs.carousel', handleSlideChange);

    // Verifica a visibilidade dos elementos do carousel inicialmente
    checkVisibility();
});
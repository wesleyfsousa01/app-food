//Intersepta e observa os elementos html
const myObserver = new IntersectionObserver( (entries) =>{
    entries.forEach( (entry) => {
        if(entry.isIntersecting){
            //adiciona a classe show se o elemento estiver visivel;
            entry.target.classList.add('show');
        }
        else {
            entry.target.classList.remove('show');
        }
    });
});

//Seleciona a classe lasOne
const elements = document.querySelectorAll('.hidden');

//Obsrva todos os elementos que possuem a classe '.hidden'
elements.forEach( (element) => myObserver.observe(element));
import './bootstrap';

//Contenido del slider
//Obteniendo los elementos html
const slider = document.querySelector("#slider");
let sliderSection = document.querySelectorAll(".slider__section");
let sliderSectionLast = sliderSection[sliderSection.length -1];
//Obteniendo los botones
const btnLeft = document.querySelector("#btn-left");
const btnRight = document.querySelector("#btn-right");
//Seleccionando la ultima imagen del carrusel y posicionandola antes de la primera
slider.insertAdjacentElement('afterbegin', sliderSectionLast);

//Botón derecho
function Next(){
    let sliderSectionFirst = document.querySelectorAll(".slider__section")[0];
    slider.style.marginLeft = "-200%";
    slider.style.transition = "all 0.5s";
    setTimeout(function(){
        slider.style.transition = "none";
        slider.insertAdjacentElement('beforeend', sliderSectionFirst);
        slider.style.marginLeft = "-100%"
    }, 500);
}

//Botón Izquierdo
function Prev(){
    let sliderSection = document.querySelectorAll(".slider__section");
    let sliderSectionLast = sliderSection[sliderSection.length -1];
    slider.style.marginLeft = "0%";
    slider.style.transition = "all 0.5s";
    setTimeout(function(){
        slider.style.transition = "none";
        slider.insertAdjacentElement('afterbegin', sliderSectionLast);
        slider.style.marginLeft = "-100%"
    }, 500);
}
//Evento del botón derecho al dar clic sobre el
btnRight.addEventListener('click', function(){
    Next();
});
//Evento del botón izquierdo al dar clic sobre el
btnLeft.addEventListener('click', function(){
    Prev();
});
//Evento para que el slider sea automatico
setInterval(function(){
    Next();
}, 5000);

//Eventos de Scroll
let animado = document.querySelectorAll(".animado");

function mostrarScroll(){
    let scrollTop = document.documentElement.scrollTop;
    for(var i = 0; i<animado.length; i++){
        let alturaAnimado = animado[i].offsetTop;
        if(alturaAnimado - 500 <scrollTop){
            animado[i].style.opacity = 1;
            //Permite que se muestre la animación de las tarjetas
            animado[i].classList.add("mostrarArriba")
        }
    }
}

window.addEventListener('scroll', mostrarScroll);

/*Eventos de Mouse*/
document.getElementById("miBoton1").onmouseover = function() {
    this.style.backgroundColor = "green";
};

document.getElementById("miBoton1").onmouseout = function() {
    this.style.backgroundColor = "blue";
};

document.getElementById("miBoton1").onclick = function(){
    alert("Proximamente...");
};

document.getElementById("miBoton2").onmouseover = function() {
    this.style.backgroundColor = "green";
};

document.getElementById("miBoton2").onmouseout = function() {
    this.style.backgroundColor = "blue";
};

document.getElementById("miBoton2").onclick = function(){
    alert("Proximamente...");
};

document.getElementById("miBoton3").onmouseover = function() {
    this.style.backgroundColor = "green";
};

document.getElementById("miBoton3").onmouseout = function() {
    this.style.backgroundColor = "blue";
};

document.getElementById("miBoton3").onclick = function(){
    alert("Proximamente...");
};

document.getElementById("miBoton4").onmouseover = function() {
    this.style.backgroundColor = "green";
};

document.getElementById("miBoton4").onmouseout = function() {
    this.style.backgroundColor = "blue";
};

document.getElementById("miBoton4").onclick = function(){
    alert("Proximamente...");
};

document.getElementById("miBoton5").onmouseover = function() {
    this.style.backgroundColor = "green";
};

document.getElementById("miBoton5").onmouseout = function() {
    this.style.backgroundColor = "blue";
};

document.getElementById("miBoton5").onclick = function(){
    alert("Proximamente...");
};

document.getElementById("miBoton6").onmouseover = function() {
    this.style.backgroundColor = "green";
};

document.getElementById("miBoton6").onmouseout = function() {
    this.style.backgroundColor = "blue";
};

document.getElementById("miBoton6").onclick = function(){
    alert("Proximamente...");
};

document.getElementById("miBoton7").onmouseover = function() {
    this.style.backgroundColor = "green";
};

document.getElementById("miBoton7").onmouseout = function() {
    this.style.backgroundColor = "blue";
};

document.getElementById("miBoton7").onclick = function(){
    alert("Proximamente...");
};

document.getElementById("miBoton8").onmouseover = function() {
    this.style.backgroundColor = "green";
};

document.getElementById("miBoton8").onmouseout = function() {
    this.style.backgroundColor = "blue";
};

document.getElementById("miBoton8").onclick = function(){
    alert("Proximamente...");
};

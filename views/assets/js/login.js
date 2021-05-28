/* LETRAS */
import Letterize from "https://cdn.skypack.dev/letterizejs@2.0.0";

    const test = new Letterize({
            targets: ".animate-me"
        });

        const animation = anime.timeline({
            targets: test.listAll,
            delay: anime.stagger(100, {
            grid: [test.list[0].length, test.list.length],
            from: "center"
            }),
            loop: true
        });

        animation
            .add({
            scale: 0.5
            })
            .add({
            letterSpacing: "10px"
            })
            .add({
            scale: 1
            })
            .add({
            letterSpacing: "6px"
            });



/* SLIDER */

const slider = document.querySelector("#slider"); /* Es como un selector de css: Guardamos en la constante */
let sliderSection = document.querySelectorAll(".slider__section"); /* Guardamos en variable por ALL de varios */
let sliderSectionLast = sliderSection[sliderSection.length -1]; /* Obtenemos al ultimo elemento */
const btnLeft = document.querySelector("#btn-left");
const btnRight = document.querySelector("#btn-rigth");


slider.insertAdjacentElement("afterbegin" , sliderSectionLast); /* Obtener el ultimo elemento y lo colocamos en el slider variable inicial*/

function Next(){ /* Siguiente Derecha */
    let sliderSectionFirst = document.querySelectorAll(".slider__section")[0]; /* Obtener el primero */
    slider.style.marginLeft = "-200%";
    slider.style.transition = "all 0.5s";
    setTimeout(function(){ /* setTimeout se encarga de ejecutar otra función después de un tiempo determinado */
        slider.style.transition = "none";
        slider.insertAdjacentElement("beforeend" , sliderSectionFirst);
        slider.style.marginLeft = "-100%";
    }, 500);
}


function Prev(){ /* Antes Izquierda */
    let sliderSection = document.querySelectorAll(".slider__section"); 
    let sliderSectionLast = sliderSection[sliderSection.length -1]; 
    slider.style.marginLeft = "0";
    slider.style.transition = "all 0.5s";
    setTimeout(function(){ 
        slider.style.transition = "none";
        slider.insertAdjacentElement("afterbegin" , sliderSectionLast);
        slider.style.marginLeft = "-100%";
    }, 500);
}

btnRight.addEventListener('click', function(){ /* addEventListener nos sirve para registra un evento a un objeto en específico */
    Next();
});

btnLeft.addEventListener('click', function(){ 
    Prev();
});


setInterval(function(){ /* Volvemos el slider automatico, setInterval: Ejecuta una funcion cada cierto tiempo */
    Next();
},4000);
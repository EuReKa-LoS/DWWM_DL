const psedo = document.querySelector("#psedo");
const resultpsedo = document.querySelector("#resultpsedo");

//On récup la valuer de l'input et à la lavé de touche ca proc
psedo.addEventListener("keyup",function(){
    resultpsedo.innerHTML = "Bonjour "+psedo.value;
});
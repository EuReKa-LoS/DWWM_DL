//Input
//const taille = document.querySelector("#taille");
//const poid = document.querySelector("#poid");
//Button
const calculer = document.querySelector("#calculer");
//Input d'affichage disable
const resultat = document.querySelector("#resultat");

const appelation = document.querySelector("#appelation")
appelation.innerHTML = "En attente du résultat";
//Curseur
const cursor = document.querySelector("#cursor");
let value=0;

calculer.addEventListener("click",calcul);
let result=0;
function calcul(){
    
    //Input
    const taille = document.querySelector("#taille").value;

    const poid = document.querySelector("#poid").value;
    console.log(`La taille est de:${poid}`);
    /*if (!isNan(taille))
    {
        appelation.innerHTML = "Maigreur";
    }*/
    result = poid/((taille*0.01)*(taille*0.01));
    resultat.value= result.toFixed(2);
    affichage(result);
    console.log(`Result est de: ${result}`);
}

function affichage(value){
    console.log(`Value est de: ${value}`);
    switch (true) {
        case (value < 16.5):
            console.log("Je suis dans condition 1");
            appelation.innerHTML = "Maigreur morbide";
            cursor.className="progress-bar bg-info blink_me";
            cursor.style="width: 15%";
            break;
        case ((value >=16.5) && (value < 18.5)):
            console.log("Je suis dans condition 2");
            appelation.innerHTML = "Maigreur";
            cursor.className="progress-bar bg-info";
            cursor.style="width: 30%";
            break;
        case ((value >=18.5) && (value < 25)):
            console.log("Je suis dans condition 3");
            appelation.innerHTML = "Poids normal";
            cursor.className="progress-bar bg-success";
            cursor.style="width: 50%";
            break;
        case ((value >=25) && (value < 30)):
            console.log("Je suis dans condition 4");
            appelation.innerHTML = "Surpoid";
            cursor.className="progress-bar bg-warning";
            cursor.style="width: 70%";
            break;
        case ((value >=30) && (value < 35)):
            console.log("Je suis dans condition 5");
            appelation.innerHTML = "Obésité de grade 1 (ou \"obésité simple\")";
            cursor.className="progress-bar bg-danger";
            cursor.style="width: 80%";
            break;
        case ((value >=35) && (value < 40)):
            console.log("Je suis dans condition 6");
            appelation.innerHTML = "Obésité de grade 2 (ou \"obésité sévère\")";
            cursor.className="progress-bar bg-danger";
            cursor.style="width: 90%";
            break;
        case (value > 40):
            console.log("Condition 7");
            appelation.innerHTML = "Obésité de grade 3 (ou \"obésité massive/morbide\")";
            cursor.className="progress-bar bg-danger blink_me";
            cursor.style="width: 100% ";
            cursor.animation="blinker 1s linear infinite";
            break;
            default:
            appelation.innerHTML = "Somethings goes wrong...";  
    }
    /*
    if(value < 16.5)
    {
        console.log("Je suis dans condition 1");
        appelation.innerHTML = "Maigreur morbide";
    }else if(value >=16.5 && value < 18.5 )
    //else if (bmi >= 18.6 && bmi < 24.9) 
    {
        console.log("Je suis dans condition 2");
        appelation.innerHTML = "Maigreur";
    }else if(value >=18.5 && value < 25 )
    {
        console.log("Je suis dans condition 3");
        appelation.innerHTML = "Poids normal";
    }else if(value >=25 && value < 30 )
    {
        console.log("Je suis dans condition 4");
        appelation.innerHTML = "Surpoid";
    }else if(value >=30 && value < 35 )
    {
        console.log("Je suis dans condition 5");
        appelation.innerHTML = "Obésité de grade 1 (ou \"obésité simple\")";
    }else if(value >=35 && value < 40 )
    {
        console.log("Je suis dans condition 6");
        appelation.innerHTML = "Obésité de grade 2 (ou \"obésité sévère\")";
    }else if(value > 40 )
    {
        console.log("Je suis dans condition 7");
        appelation.innerHTML = "Obésité de grade 3 (ou \"obésité massive/morbide\")";
    }
*/
    
}
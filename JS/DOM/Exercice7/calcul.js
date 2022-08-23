
const addition = document.querySelector("#addition");
const factorielle = document.querySelector("#factorielle");

addition.addEventListener('click', function(){
    add();
    }
);
    
factorielle.addEventListener('click', function(){
    facto();
    }
);

function facto(){
    //Initialisé la value ici pour évité les reste dans la value
    const chiffre = document.querySelector("#chiffre").value; 
    let i, resultFacto;
    resultFacto = 1;
    if(isNaN(chiffre)){
        document.querySelector("#resultchiffre").innerHTML = "Merci de saisir un chiffre uniquement :)";
    }
    else
    {
        //Patern facto 8*7*6* blablabla
        for(i = 1; i <= chiffre; i++)
        {
        resultFacto = resultFacto * i;
        }
        i = i - 1;  
        document.querySelector("#resultchiffre").innerHTML = "Le résultat du calcul demandé (factorielle) est : " + resultFacto;
    }
}

function add(){
    //Initialisé la value ici pour évité les reste dans la value
    const chiffre = document.querySelector("#chiffre").value; 
    //ne surtout pas mettre i ici ^^
    let j, resultAdd;
    resultAdd = 0;
    if(isNaN(chiffre)){
        document.querySelector("#resultchiffre").innerHTML = "Merci de saisir un chiffre uniquement :)";
    }
    else
    {
        //Patern addition ?  8+7+6+ blablabla
        for(j = 1; j <= chiffre; j++)  
        {
        resultAdd = resultAdd + j;
        }
        j = j - 1;  
        document.querySelector("#resultchiffre").innerHTML = "Le résultat du calcul demandé (addition) est : " + resultAdd;
    }
}
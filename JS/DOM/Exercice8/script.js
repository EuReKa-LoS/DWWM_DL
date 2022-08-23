const recap = document.querySelector("#recap");
const resultat = document.querySelector("#resultat");
resultat.value= 0;
let affichage = "";
// Total Recap avec Arnold Schwarzenegger
let totalrecap ="";
let previous=0;

let touches = document.querySelectorAll("button");
//Boucle foreach
for(let touche of touches){
        touche.addEventListener("click",gestionBoutons);
        
}
//}
//
function gestionBoutons(){
    // Attribution des touches par récupération du text dans le bouton pour évité de le faire en dur
    let touche = this.innerText;
    //Test touche
    //console.log("clic");
    // Check NaN (0-9 et . OK)
    if(parseFloat(touche) >= 0 || touche === ".")
    {
        //Affichage concatené pour le recap de bas de page
        //console.log(touche);
        affichage = (affichage === "") ? touche.toString() : affichage + touche.toString();
        //Juste pour le recap
        totalrecap = (totalrecap === "") ? touche.toString() : totalrecap + touche.toString();
        //Test de l'affichage
        //console.log(affichage);
        recap.innerText = totalrecap;
    }
    else
    {   
        //Pompé depuis Java :P
        switch(touche){
            //Touche de reset
            case "C":
                previous=0;
                affichage= "";
                totalrecap= "";
                operation = null;
                recap.innerText = 0;
                resultat.value= 0;
                break;
            // Touche opératoire
            case "+":
            case "-":
            case "X":
            case "/":

                previous = (previous ===0) ? parseFloat(affichage) : calculer(previous, parseFloat(affichage), operation);
                recap.innerText = previous;
                operation=touche;
                //Stock les touches
                totalrecap = totalrecap+touche;
                affichage = "";
                break;
            case "=":
                previous = (previous ===0) ? parseFloat(affichage) : 
                calculer(previous, parseFloat(affichage), operation);
                //Affichage résultat final
                resultat.value= previous;
                //On stock le résultat pour pouvoir continué les opérations
                affichage = previous;
                previous = 0;
                break;
        }
        
    }
}
//Test de déclaration propre de fonction
/**
 * 
 * @param {number} nb1 
 * @param {number} nb2 
 * @param {string} operation 
 * @returns number
 */
function calculer(nb1, nb2, operation){
    //On force les float sur les opérateur
    nb1 = parseFloat(nb1);
    nb2 = parseFloat(nb2);
    if(operation == "+") return nb1 + nb2;
    if(operation == "-") return nb1 - nb2;
    if(operation == "X") return nb1 * nb2;
    if(operation == "/") return nb1 / nb2;
}

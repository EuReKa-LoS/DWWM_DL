//Exercice 2
let readline = require("readline-sync");
/* creation de l'objet personnage */
let Personnage = {
   Nom : null ,
   Age : null
}
/* Demande du nom */
Personnage.nom = readline.question('Quel est le nom du personnage ?\n');
/* Demande de l'age dans une boucle pour vérifier si on rentre bien un chiffre */
while (isNaN(Personnage.age = readline.question("Quel est l'age du personnage ?")))
{
   console.log("Veuillez recommencer la saisie, vous devez saisir un nombre");
}
/* Affichage des infos de l'objet */
console.log(`Nom du personnage : ${Personnage.nom}`);
console.log(`Age du personnage : ${Personnage.age}`);
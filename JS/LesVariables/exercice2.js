//Exercice 2
let Nom="Toto";
let Age=30;
sexe="Homme";
console.log("Affichage");
console.log("Nom : ",Nom);
console.log("Age :",Age);
console.log("Sexe : ",sexe);

const readline = require('readline').createInterface({
    input: process.stdin,
    output: process.stdout
  });
  
  readline.question('Saisie clavier', sasieclavier => {
    console.log(`Votre saisie est ${sasieclavier}!`);
    readline.close();
  });
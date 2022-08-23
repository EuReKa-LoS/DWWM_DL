//Exercice 3
const readline = require('readline').createInterface({
    input: process.stdin,
    output: process.stdout
  });
  
  readline.question('Puissance voulue ?', puissancevoulue => {
    result=Math.pow(2, puissancevoulue);
    console.log("2 à la puissance "+puissancevoulue+" = "+result);
    readline.close();
  });
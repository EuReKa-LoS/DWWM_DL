//Exercice 5
const readline = require('readline').createInterface({
    input: process.stdin,
    output: process.stdout
  });
  readline.question('Quelle table de multiplication voulez-vous afficher ? ', multiplication => {
    
    for (let i=1;i<=10; i++){
        result=multiplication*i;
        console.log(multiplication+" * "+i+" = "+result);
    }
readline.close();
  });
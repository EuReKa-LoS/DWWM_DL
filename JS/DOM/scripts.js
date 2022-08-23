const div = document.getElementById('container');
const divnom = document.getElementById('nom');
const divprenom = document.getElementById('prenom');
//Exo 1
//Remplaccement du contenus de la div (qui affiche juste "Hello")
div.innerHTML = "<h2>Bonjour</h2>";

//Exo 2
//On change le BG de l'id "nom"
divnom.style.backgroundColor = 'green';
//On change le BG de l'id "prenom"
divprenom.style.backgroundColor = 'red';

//Exo 3
let button1 = document.querySelector("#clicmoi"),
  clic = 0;
  button1.onclick = function() {
    clic += 1;
    // Condition pour mettre un s à clic...
    if(clic<=1)
    {
        button1.innerHTML = clic+" clic";
    }
    else
    {
        button1.innerHTML = clic+" clics";
    }
  
};
// Exo 4
function table()
{
let button = document.querySelector('#multiplication');

let strTabledetrois = '';
for (let i=1; i<12; i++) {
    strTabledetrois += "<tr><td>"+3 + " * " + i +" = </td><td>"+5*i + '</td></tr>';
}
let p_tables = document.querySelector("#tables").innerHTML = strTabledetrois;
}

// Exo 5
let button2 = document.querySelector("#pileOuFace");
button2.onclick = function reload() {

let piece=Math.random();
    if(piece<0.5)
    {
        button2.innerHTML = "Pile";
    }
    else
    {
        button2.innerHTML = "Face";
    }
};
//Exo 6
let button2 = document.querySelector("#email");
function ValidateEmail(input)
{
let formatMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(input.value.match(formatMail))
{
alert("Adresse email valide");
document.formu.email.focus();
return true;
}
else
{
alert("Adresse email invalide");
document.formu.email.focus();
document.querySelector("#error").style.display="contents";
return false;
}
}
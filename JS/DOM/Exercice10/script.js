const formulaire = document.querySelector(".form-quizz");
let tableauResultats = [];
let reponses = ['c','a','b','a','c']; //c=>Napoleon, a=>4/07/1776, b=>476 ap.J.-C, a=>Ljubljana, c=>4.9
const btn = document.querySelector('#btnResult');
const titreResultat = document.querySelector('.resultats h2');
const notes = document.querySelector('#note');
const toutesLesQuestions = document.querySelectorAll('.question-block');
let verifTab = [];

//Clic sur le bouton ca foire de ouf
formulaire.addEventListener("submit", (event) => {
    verifTab = [];
    event.preventDefault();
    for (i = 1; i < 6; i++){
        //Ajout des réponse dans un tableau
        tableauResultats.push(document.querySelector(`input[name= 'question${i}']:checked`).value
          );
        }
        verification(tableauResultats);
        tableauResultats = [];
      })
//Fonctionde vérification
function verification(tableauResultats){
    verifTab = [];
    for(let j = 0; j < 5; j++){
        //Si le tableau de correction est sritectement exact au tableau de réponse
        if(tableauResultats[j]===reponses[j]){
            verifTab.push(true);
        }else{
            verifTab.push(false);
            
        }
    }
    afficherResultats(verifTab);
    couleursFonction(verifTab)
    
}

        function afficherResultats(tableauDeCheck) {
                const nombreDeFautes = tableauDeCheck.filter(el => el !== true).length;
                // console.log(nombreDeFautes);
                switch(nombreDeFautes) {
                    
                    case 0: 
                    titreResultat.innerText = "Félicitation ! c'est un sans fautes !"
                    startConfetti();
                    document.querySelector("#header-quizz").classList.add("blink_me");
                    notes.innerText = "5/5"
                    break;
                    case 1:
                        titreResultat.innerText = "Une faute c'est prometteur"
                        notes.innerText = '4/5'
                        break;
                    case 2:
                        titreResultat.innerText = "Encore un effort ... ou deux..."
                        notes.innerText = '3/5'
                        break;
                    case 3:
                        titreResultat.innerText = "Encore quelques erreurs."
                        notes.innerText = '2/5'
                        break;
                    case 4:
                        titreResultat.innerText = "Une réponse c'est mieux que zéro."
                        notes.innerText = '1/5'
                        break;
                    case 5:
                        titreResultat.innerText = "Désolé vous n'avez aucune bonne réponse."
                        notes.innerText = '0/5'
                    break;
                    default:
                        'Wops, cas innatendu.';   
                    
                }
            }
            
            function couleursFonction(tabValBool) {
                for(let j = 0; j < tabValBool.length; j++){
            
                    if(tabValBool[j] === true){
                        toutesLesQuestions[j].style.background = 'lightgreen';
                        //toutesLesQuestions[j].style.image = "linear-gradient(to right, #a8ff78, #78ffd6";
                    } else{
                        toutesLesQuestions[j].style.background = '#ffb8b8';
                        toutesLesQuestions[j].classList.add('echec');
                        toutesLesQuestions[j].classList.add('blink_bad');
            
                        setTimeout(() => {
                            toutesLesQuestions[j].classList.remove('echec');
            
                        }, 1000)
                    }
                }
            
            }
            
            toutesLesQuestions.forEach(item => {
            
                item.addEventListener('click',() => {
                    item.style.background = "white";
                })
            
            })
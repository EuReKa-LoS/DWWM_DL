
const resultat = document.querySelector("#resultat");
const recap = document.querySelector("#recap");

/*
//Je ne pense pas avoir besoin de l'écrire en dur, je peut fair eun array sur les boutons
c0" class="col btn btn-primary m-2">0</button>
c1" class="col btn btn-primary m-2">1</button>
c2" class="col btn btn-primary m-2">2</button>
c3" class="col btn btn-primary m-2">3</button>
c4" class="col btn btn-primary m-2">4</button>
c5" class="col btn btn-primary m-2">5</button>
c6" class="col btn btn-primary m-2">6</button>
c7" class="col btn btn-primary m-2">7</button>
c8" class="col btn btn-primary m-2">8</button>
c9" class="col btn btn-primary m-2">9</button>
btnMul" class="col btn btn-primary m-2">X</button>
btnDiv" class="col btn btn-primary m-2">/</button>
btnPlus" class="col btn btn-primary m-2">+</button>
btnSous" class="col btn btn-primary m-2">-</button>
btnPoint" class="col btn btn-primary m-2">.</button>
btnEgal" class="col btn btn-primary m-2">=</button>
*/
//Chargement du programme une fois l'affichage à l'écran sinon bug causé par bootstrap
Windows.onload = () =>{
    //Clic sur les touches
    let touches = document.querySelectorAll("button");
    //Boucle foreach
    for(let touche of touches){
        touche.addEventListener("click",gestionBoutons);
    }
}
//
function gestionBoutons(){
    //
    console.log("clic");
}
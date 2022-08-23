let win=false;
let count=1;
let tour = document.querySelector("#tour"),
    boxes = document.querySelectorAll("#morpion button"), XO = 0;

    function selectionBoxGagnant(b1, b2, b3) {
      b1.classList.add("btn-success");
      b2.classList.add("btn-success");
      b3.classList.add("btn-success");
      tour.innerHTML = b1.innerHTML + " est gagnant";
      tour.style.fontSize = "40px";
      win=true;
    }

    function getButtons() {
    let box1 = document.querySelector("#box1"), //Top left
        box2 = document.querySelector("#box2"), //Top
        box3 = document.querySelector("#box3"), //Top Right
        box4 = document.querySelector("#box4"), //Left
        box5 = document.querySelector("#box5"), //Middle
        box6 = document.querySelector("#box6"), //Right
        box7 = document.querySelector("#box7"), //Bottom Left
        box8 = document.querySelector("#box8"), //Bottom
        box9 = document.querySelector("#box9"); //Bottom Right
      /*
      ***
      
      */
      if (box1.innerHTML !== "" && box1.innerHTML === box2.innerHTML && box1.innerHTML === box3.innerHTML)
        selectionBoxGagnant(box1, box2, box3);
      if (box4.innerHTML !== "" && box4.innerHTML === box5.innerHTML && box4.innerHTML === box6.innerHTML)
        selectionBoxGagnant(box4, box5, box6);
      if (box7.innerHTML !== "" && box7.innerHTML === box8.innerHTML && box7.innerHTML === box9.innerHTML)
        selectionBoxGagnant(box7, box8, box9);
      if (box1.innerHTML !== "" && box1.innerHTML === box4.innerHTML && box1.innerHTML === box7.innerHTML)
        selectionBoxGagnant(box1, box4, box7);
      if (box2.innerHTML !== "" && box2.innerHTML === box5.innerHTML && box2.innerHTML === box8.innerHTML)
        selectionBoxGagnant(box2, box5, box8);
      if (box3.innerHTML !== "" && box3.innerHTML === box6.innerHTML && box3.innerHTML === box9.innerHTML)
        selectionBoxGagnant(box3, box6, box9);
      if (box1.innerHTML !== "" && box1.innerHTML === box5.innerHTML && box1.innerHTML === box9.innerHTML)
        selectionBoxGagnant(box1, box5, box9);
      if (box3.innerHTML !== "" && box3.innerHTML === box5.innerHTML && box3.innerHTML === box7.innerHTML)
        selectionBoxGagnant(box3, box5, box7);

    }
    for (let i = 0; i < boxes.length; i++) {
             
      boxes[i].addEventListener('click', function () {
        if(win!=true)
        {   
            if(XO!=9)
            {
                if (this.innerHTML !== "X" && this.innerHTML !== "O") {
                    if (XO % 2 === 0) {
                      //console.log(XO);
                      //console.log(count);
                      this.innerHTML = "X";
                      this.style.fontSize = "85px";
                      tour.innerHTML = "Joueur un (O)";         
                      getButtons();
                      XO += 1;          
                    } else {
                      //console.log(XO);
                      //console.log(count);
                      this.innerHTML = "O";
                      this.style.fontSize = "85px";
                      tour.innerHTML = "Joueur deux (X)";
                      getButtons();
                      XO += 1;
                    }
                    count++; 
                    console.log(count);
                  }
            }
            else
            {
                tour.innerHTML = "Egalité !";
                tour.classList.add("blink_me");
                //tour.style.color("red");
            }
    }
      });
      
    }
   

    document.querySelector('#reJouer').addEventListener('click', reJouer);
    function reJouer() {
        win=false;
        count=0;
        XO=0
      for (let i = 0; i < boxes.length; i++) {
        boxes[i].classList.remove("btn-success");
        boxes[i].innerHTML = "";
        tour.innerHTML = "Jouer";
        tour.style.fontSize = "25px";
        tour.classList.remove("blink_me");

      }

    }
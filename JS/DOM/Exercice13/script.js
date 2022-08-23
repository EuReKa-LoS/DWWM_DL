// Function pour le SVG (qui affiche par exemple le titre quand on survole et compagnie)
function svgTip(a){a=a||{},a.fontsize=a.fontsize||"1.5rem",a.padding=a.padding||"10px",a.bgcolor=a.bgcolor||"hsl(0, 0%, 0%)",a.color=a.color||"#fff",a.opacity=a.opacity||.8,$.each($("[title]","svg"),
function(b,c){var d=$(this).attr("title"),e=$("<div class='svgtip'>"+d+"</div>");e.css({position:"absolute",top:"50%",left:"50%",transform:"translate(-50%,-50%)",display:"none","background-color":a.bgcolor,color:a.color,padding:a.padding,"font-size":a.fontsize,opacity:a.opacity,"pointer-events":"none"}),$(this).hover(function(a){e.css({left:a.clientX,top:a.clientY+$(window).scrollTop()}),e.addClass("active"),e.show()},
function(){e.hide(0),e.removeClass("active")}),$(this).on("mousemove",function(a){e.hasClass("active")&&e.css({left:a.clientX,top:a.clientY+$(window).scrollTop()-e.height()})}),$("body").append(e)})}
function lll(a){$("#debug").append(a+"<br/>")}new svgTip({fontsize:"var(--responsive)",padding:"5px"});

// Ici commence mes déclarations de composants
const idRegion = document.querySelector("#idRegion")

//Ici je vais selectionné tout les path (SVG)
let regions = document.querySelectorAll("path");
//Boucle foreach pour chacune des régions
for(let region of regions){
    //Et ici je leur ajout à chacun un EvenListener
    region.addEventListener("click",gestionRegions);
}
// Focntion qui va call ma requête PHP
function gestionRegions(){
    //On récupère l'id du SVG cliqué pour la requête
    dataRegion=this.getAttribute("id");
    //J'ouvre une requête en AJAX (JAVA Asynchrone)
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5 car il utilise activeX
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
        xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        idRegion.innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","./check.php?nom="+dataRegion,true);
    console.log(xmlhttp)
    xmlhttp.send();
}
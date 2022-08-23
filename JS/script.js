const btn = document.querySelector("button");

btn.addEventListener('click',validate);

function validate() { 
    let msg; 
    let msglog;
    const pass = document.querySelector(".pass").value; 
    const login = document.querySelector(".login").value; 
    if (pass.match( /[0-9]/g) && 
            pass.match( /[^a-zA-Z\d]/g) &&
            pass.length >= 8)
            msg = "<p style='color:green'>Password valide.</p>";

            else
            msg = "<p style='color:red'>Password invalide, 8 chiffres et 1 caractère spécial requis.</p>";
            document.querySelector(".msg").innerHTML= msg; 
    if (login.match( /[@]/g) && 
            login.match( /[.]/g)){
            msglog = "<p style='color:green'>Login valide.</p>";
            document.querySelector(".msglog").innerHTML= msglog; 
            document.querySelector(".login").style.background='green';
            
            }else{
            msglog = "<p style='color:red'>Login invalide, entre un email.</p>";
            document.querySelector(".msglog").innerHTML= msglog; 
            document.querySelector(".login").style.background='red';
            }
        }
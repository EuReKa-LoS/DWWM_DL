//01d.svg // Soleil
//02d.svg // Couvers
/* --- Nuageux --- */
//03d.svg // Nuageux
//04d.svg // Nuageux
//50d.svg // Nuageux-inversé
/* -- Identique -- */
//09d.svg // Légère pluie
//10d.svg // Pluie
//11d.svg // Orage
//13d.svg // Neigeux
// API_KEY dfa8c0baa07489cd9a42eaa45a08c77a
let API_key="49cc8c821cd2aff9af04c9f98c36eb74"
//
//const time = new Date();
//const days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']
//const day = time.getDay();
// API 3.0 Test avec "lat":48.8534, "lon":2.3488 Paris FR
let lat=48.8534
let lon=2.3488
const minWeather = document.querySelector("#miniWeatherBug table")
const boiteBouton = document.querySelector("#boiteBouton")
const image = document.querySelector("#weatherBug img")
const minImage = document.querySelector("#miniWeatherBug img")
const previsionsHeures = document.querySelector("#previsionsHeures")
const previsionsSemaine = document.querySelector("#previsionsSemaine")
//url current ville Paris FR en 2.5:


//url= `https://api.openweathermap.org/data/3.0/onecall?lat=${lat}&lon=${lon}&appid=1edabae8aae767df651cc323c8677c57`
//url=`https://api.openweathermap.org/data/3.0/onecall?lat=22&lon=58&exclude={part}&appid=1edabae8aae767df651cc323c8677c57`;
//url=`https://api.openweathermap.org/data/2.5/weather?q=${inputVal}&appid=dfa8c0baa07489cd9a42eaa45a08c77a&units=metric&lang=fr`;


//Zone Geolocalisation
document.querySelector("#findLocation").addEventListener("click", geoLookUp, false)

// Selecteur //
//previsionsHeures.addEventListener("click", setWidget(lat, lon))
//previsionsSemaine.addEventListener("click", setPrevision(lat, lon))
// 
//Modification du status
function geoLookUp(){
  const status = document.querySelector("#Status")

  function succes(position){
    lat = position.coords.latitude
    lon = position.coords.longitude
    status.textContent = `Lat: ${lat}, Lon:${lon}`
    setWeather(lat, lon)
    setPrevision(lat, lon)
    //setWidget(lat, lon)
  }
  function error(err){
    status.textContent = `Impossibilité de trouvé votre localisation. Erreur: ${err.code}. ${err.message}`
  }

  if(!navigator.geolocation){
    status.textContent = "Géolocalisation non supporté par votre navigateur"
  }else{
    status.textContent = "Localisation..."
    navigator.geolocation.getCurrentPosition(succes, error)
  }
}

function setWeather(lat, lon){
  const weather = document.querySelector("#weatherBug p")
  
  urlmono=`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${API_key}&units=metric&lang=fr`;
  
  let openWeatherData = {}
  let xhr = new XMLHttpRequest()
  xhr.open('GET',urlmono);
  xhr.responseType="text";
  
  xhr.addEventListener('load', function(){
    if(xhr.status ===200){
      weather.textContent= "Loading..."
      openWeatherData = JSON.parse(xhr.responseText)
      populateWeatherInfo(openWeatherData, weather)
    }else{
      weather.textContent= "error" +xhr.status
    }
  }, false)
  
  xhr.send()

}
/*
Fonction de récupération des informations
Attention on récupère du JSON ilisible.
Le formater dans:
https://jsonformatter.curiousconcept.com/
Il est découpé en list dans des listes par exemple
*/
function populateWeatherInfo(openWeatherData, weather){
  //name, temp, wind, time
  //const location = openWeatherData.city.name
  //const temp = Math.round(openWeatherData.list[0].main.temp)
  //const wind = openWeatherData.list[0].wind.speed
  //const icons = openWeatherData.list[1].weather[0].icon
  //const alt_img = openWeatherData.list[0].weather[0].description
  //On chope le temps en ms et mon le multiplie par 1000 pour l'avoir en s
  const location = openWeatherData.name
  const temp = Math.round(openWeatherData.main.temp)
  const wind = openWeatherData.wind.speed
  const time = new Date(openWeatherData.dt * 1000)
  const hrs = time.getHours()
  const mins =time.getMinutes()
  /*
  Liste: 0 9h
  Liste: 1 12h
  Liste: 2 15h

  */
  const str = `${location} ${temp}:C°;<br>
  Vitesse du vent: ${wind}km/h<br>
  ${hrs}:${mins}`
  weather.innerHTML = str
  //image.src = `img/${openWeatherData.list[1].weather[0].icon}.svg`
  //image.alt = `${openWeatherData.list[0].weather[0].description}`
  image.src = `img/${openWeatherData.weather[0].icon}.svg`
  image.alt = `${openWeatherData.weather[0].description}`
    //Supprime la class "Invisible" de la div des boutons
    boiteBouton.classList.remove("invisible")
}


// Hourly (+3h)
function setWidget(lat, lon){
  const miniWeather = document.querySelector("#miniWeatherBug")
  miniWeather.innerHTML =""
  strWidget=""
  urlmult=`https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${API_key}&units=metric&lang=fr`;
  
  let openMiniWeatherData = {}
  let widgeto = new XMLHttpRequest()
  widgeto.open('GET',urlmult);
  widgeto.responseType="text";
  
  widgeto.addEventListener('load', function(){
    if(widgeto.status ===200){
      openMiniWeatherData = JSON.parse(widgeto.responseText)
      populateMiniWeatherInfo(openMiniWeatherData, miniWeather)
    }else{
      miniWeather.textContent= "error" +widgeto.status
    }
  }, false)
  
  widgeto.send()

}
function populateMiniWeatherInfo(openMiniWeatherData, miniWeather){
  for(let i=0;i<=6;i++){
  const miniTime = new Date(openMiniWeatherData.list[i].dt * 1000)
  const minihrs = miniTime.getHours()
  const minimins =miniTime.getMinutes()
  const miniIcons = openMiniWeatherData.list[i].weather[0].icon
  const miniAlt = openMiniWeatherData.list[i].weather[0].description
  const miniTemp = Math.round(openMiniWeatherData.list[i].main.temp)
  const strWidget = `
  <tr>
    <td>
      <img src="img/${miniIcons}.svg" alt="${miniAlt}"class="flex" height="64" width="64"></img>
      <p>${minihrs}h</p>
      <p>${miniTemp}°</p>
    </td>
  </tr>`
    miniWeather.innerHTML += strWidget
  }
}

//Prévision
function setPrevision(lat, lon){
  //Partie pour les prévisions
  urlPrevisions=`https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&exclude=hourly,minutely&units=metric&appid=${API_key}&units=metric&lang=fr`
  const minWeather = document.querySelector("#miniWeatherBug")
  minWeather.innerHTML =""

  let openPreviWeatherData = {}
  let widgeto = new XMLHttpRequest()
  widgeto.open('GET',urlPrevisions);
  widgeto.responseType="text";
  
  widgeto.addEventListener('load', function(){
    if(widgeto.status ===200){
      openPreviWeatherData = JSON.parse(widgeto.responseText)
      populatePreviWeatherInfo(openPreviWeatherData, minWeather)
    }else{
      minWeather.textContent= "error" +widgeto.status
    }
  }, false)
  
  widgeto.send()

}
function populatePreviWeatherInfo(openPreviWeatherData, minWeather){
  for(let i=0;i<=7;i++){
  const PreviTime = new Date(openPreviWeatherData.daily[i].dt * 1000)
  const Previhrs = PreviTime.getHours()
  const Previmins =PreviTime.getMinutes()
  const PreviIcons = openPreviWeatherData.daily[i].weather[0].icon
  const PreviAlt = openPreviWeatherData.daily[i].weather[0].description
  const PreviTemp = Math.round(openPreviWeatherData.daily[i].temp.day)
  const jour =window.moment(PreviTime).format('ddd')
  const strWidget = `
  <tr>
    <td>
      <img src="img/${PreviIcons}.svg" alt="${PreviAlt}"class="flex" height="64" width="64"></img>
      
      <div class="day">${jour}</div>
      <p>${PreviTemp}°</p>
    </td>
  </tr>`
  minWeather.innerHTML += strWidget
  }
}
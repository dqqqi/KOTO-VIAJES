var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 10000); // Change image every 10 seconds
 
}

function relojAnalogico(divReloj)
{  
  function crearReloj(divReloj) {

  /*CREAR ESFERA RELOJ Y APLICAR ESTILOS*/
  var relojEsfera = document.createElement('div');
  relojEsfera.id = 'relojEsfera';
  relojEsfera.class= 'reloj relojEsfera';
  divReloj.appendChild(relojEsfera);
  relojEsfera.style.textAlign ='center';
  relojEsfera.style.position = 'relative';
  relojEsfera.style.top = '1%';
  relojEsfera.style.width = '25%';
  relojEsfera.style.height = '100%';
  relojEsfera.style.border = '20px solid rgba(0, 0, 0, 0.300)';
  relojEsfera.style.outline='2px solid white'
  relojEsfera.style.WebkitTextStrokeWidth= '1px';
  relojEsfera.style.WebkitTextStrokeColor= 'black';
  relojEsfera.style.borderRadius = '100%';
  relojEsfera.style.left = (divReloj.offsetWidth/2) -  (relojEsfera.offsetWidth/2) +'px';

  
  
  /*CREAR MANECILLA SEGUNDOS Y APLICAR ESTILOS*/
  var segundos = document.createElement('div');
  segundos.id = 'relojSegundos';
  segundos.class = 'reloj manecillas segundos';
  relojEsfera.appendChild(segundos);
  segundos.style.border = '1px solid rgba(0, 0, 0, 0)';
  segundos.style.outline= '2px solid white'
  segundos.style.borderRadius='100px'
  segundos.style.position = 'absolute';
  segundos.style.left = '50%';
  segundos.style.bottom = '50%';
  segundos.style.height = '45%';
  segundos.style.width = '0';
  segundos.style.transformOrigin = '50% 100%';
  segundos.style.transition = 'transform 1s ease';
    
  /*CREAR MANECILLA MINUTOS Y APLICAR ESTILOS*/
  var minutos = document.createElement('div');
  minutos.id = 'relojMinutos';
  minutos.class = 'reloj manecillas minutos';
  relojEsfera.appendChild(minutos);
  minutos.style.border = '1px solid rgba(0, 0, 0, 0';
  minutos.style.outline = '2px solid white';
  minutos.style.position = 'absolute';
  minutos.style.borderRadius='100px';
  minutos.style.left = '50%';
  minutos.style.bottom = '50%';
  minutos.style.height = '35%';
  minutos.style.width = '0';
  minutos.style.transformOrigin = '50% 100%';
  minutos.style.transition = 'transform 1s ease';
    
  /*CREAR MANECILLA HORAS Y APLICAR ESTILOS*/
  var horas = document.createElement('div');
  horas.id = 'relojHoras';
  horas.class = 'reloj manecillas horas';
  relojEsfera.appendChild(horas);
  horas.style.border = '1px solid rgba(0, 0, 0, 0)';
  horas.style.outline = '2px solid white';
  horas.style.borderRadius= '100px'
  horas.style.position = 'absolute';
  horas.style.left = '50%';
  horas.style.bottom = '50%';
  horas.style.height = '20%';
  horas.style.width = '0';
  horas.style.transformOrigin = '50% 100%';
  horas.style.transition = 'transform 1s ease';
    
  /*CREAR RELOJ DIGITAL Y APLICAR ESTILOS*/
  var horad = document.createElement('div');
  horad.id = 'horad';
  horad.class= 'reloj horad';
  divReloj.appendChild(horad);
  horad.style.position = 'relative';
  horad.style.height = '13%';
  horad.style.top = '2%';
  horad.style.textAlign = 'center';
  horad.style.color = 'rgba(0, 0, 0, 0)';
  horad.style.fontSize = '200%';
  
  }  
  
  function crearHoraReferencia() {
    var tiempoI = new Date();
    var tiempoS = tiempoI.getSeconds();
    var tiempoM = tiempoI.getMinutes() * 60 + tiempoS;
    var tiempoH = tiempoI.getHours() % 12 * 3600 + tiempoM;
    
    var horaRef = {horaRef : tiempoI, segundosRef : tiempoS, minutosRef : tiempoM, horasRef: tiempoH };
    return horaRef;
    
  }
  
  function calcularHora() {
    var tiempo = new Date();
    return tiempo;
  }
  
  function calcularRotacionManecillas(horaRef, horaActual) {    
    var diferencia = Math.round(Math.abs(horaActual.getTime()-horaRef.horaRef.getTime()) / 1000);
    var rotarSegundos = ((horaRef.segundosRef + diferencia) / 60 * 360);
    var rotarMinutos = ((horaRef.minutosRef + diferencia) / 3600 * 360);
    var rotarHoras = ((horaRef.horasRef + diferencia) / 43200 * 360);  
    
    rotarManecillas(rotarSegundos, rotarMinutos, rotarHoras)
  }
  
  function rotarManecillas(rotSeg, rotMin, rotHor)
  {
      document.getElementById('relojSegundos').style.transform='rotate('+ rotSeg +'deg)';
      document.getElementById('relojMinutos').style.transform='rotate('+ rotMin +'deg)';
      document.getElementById('relojHoras').style.transform='rotate('+ rotHor +'deg)';
  }
  
  function mostrarHora(tiempo) {
    var segundos = tiempo.getSeconds();
    var minutos = tiempo.getMinutes();
    var horas = tiempo.getHours();
    var hora = document.getElementById('horad');
    if ( segundos < 10 )
    {
      segundos = '0'+segundos;
    }
    
    if ( minutos < 10 )
    {
      minutos = '0'+minutos;
    }
    
    if ( horas < 10 )
    {
      horas = '0'+horas;
    }
    
    hora.innerHTML =  horas + ' : ' + minutos + ' : ' + segundos;
  }
  
  function actualizarReloj (horaRef, horaActual)
  {
    mostrarHora(horaActual);
    calcularRotacionManecillas(horaRef, horaActual)
  }
  
  crearReloj(divReloj);
  var horaRef = crearHoraReferencia();
  actualizarReloj(horaRef,calcularHora())
  setInterval(function() {actualizarReloj(horaRef,calcularHora())},1);
}

relojAnalogico(document.getElementById('relojAnalogico'));

var slideIndex = 1;

var myTimer;

var slideshowContainer;

window.addEventListener("load",function() {
    showSlides(slideIndex);
    myTimer = setInterval(function(){plusSlides(1)}, 4000);
  
    //COMMENT OUT THE LINE BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
    slideshowContainer = document.getElementsByClassName('slideshow-inner')[0];
  
    //UNCOMMENT OUT THE LINE BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
     slideshowContainer = document.getElementsByClassName('slideshow-container')[0];
  
    slideshowContainer.addEventListener('mouseenter', pause)
    slideshowContainer.addEventListener('mouseleave', resume)
})

// NEXT AND PREVIOUS CONTROL
function plusSlides(n){
  clearInterval(myTimer);
  if (n < 0){
    showSlides(slideIndex -= 1);
  } else {
   showSlides(slideIndex += 1); 
  }
  
  //COMMENT OUT THE LINES BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
  
  if (n === -1){
    myTimer = setInterval(function(){plusSlides(n + 2)}, 4000);
 } else {
    myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
  }
}

//Controls the current slide and resets interval if needed
function currentSlide(n){
  clearInterval(myTimer);
  myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
  showSlides(slideIndex = n);
}

function showSlides(n){
  var i;
  var slides = document.getElementsByClassName("mySlidess");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

pause = () => {
  clearInterval(myTimer);
}

resume = () =>{
  clearInterval(myTimer);
  myTimer = setInterval(function(){plusSlides(slideIndex)}, 4000);
}
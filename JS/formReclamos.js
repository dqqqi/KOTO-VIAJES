// funciones del modal
const modal = document.querySelector('.form');
const imagenes=document.querySelector('.carousels');
const mobi = document.querySelector('.mobilew');
const modal2 = document.querySelector('.form2');
const modal3 = document.querySelector('.form3');

/* form digital */
function openModal(){
    modal.style.display='block';
    imagenes.style.display='none';
    modal2.style.display='none';
    modal3.style.display='none';
    mobi.style.display='none';
    
}
function openModal2(){
    modal.style.display='none';
    imagenes.style.display='none';
    modal2.style.display='block';
    modal3.style.display='none';
    mobi.style.display='none';
}
function openModal3(){
    modal.style.display='none';
    imagenes.style.display='none';
    modal2.style.display='none';
    modal3.style.display='block';
    mobi.style.display='none';
}
element.addEventListener('wheel', (event) => {
  event.preventDefault();

  element.scrollBy({
    left: event.deltaY < 0 ? -30 : 30,
  });
});

function openNAV(NName) {
    document.getElementById(NName).classList.toggle('exnav')
    
  }

function openReal(realName) {
    document.getElementById(realName).classList.toggle('hidden')
    
  }
  function selectReal(seName) {
    document.getElementById(seName).classList.toggle('select')
    
  }







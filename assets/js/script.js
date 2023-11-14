console.log('burger');
const menuburger = document.querySelector('.menuburger')
const button = document.querySelector('.buttonmenu');
const nav = document.querySelector('.navnewmenu');
const backdrop = document.querySelector('.backdrop');
const remove = document.querySelector('.container');
const remove2 = document.querySelector('footer');
button.addEventListener('click', () => {
  menuburger.classList.toggle('openburger');
  nav.classList.toggle('open');
  remove.classList.toggle('remove');
  remove2.classList.toggle('remove');
});

const burger= document.querySelector('.buttonmenu'); 
burger.addEventListener('click', ()=> {
  burger.classList.toggle('activee');
});


//formulaire

var modal = document.getElementById('myModal');
const btn = document.querySelectorAll('.myBtn')
btn.forEach(function(button ) {
    button.addEventListener('click', function(e){
      e.preventDefault();

      modal.style.display = "block";
    });
    
})

window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
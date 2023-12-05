
//menu beuger mobile
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

//carroussel
let currentImageIndex = 0;
document.addEventListener("DOMContentLoaded", () => {
    //const currentFile = scriptData.currentFile;
    const carouselContainer = document.querySelector('.carousel-container');
    const carouselTrack = document.querySelector('.carousel-track');
    const images = document.querySelectorAll('.carousel-item');
    const prevButton = document.querySelector('.prev-btn');
    const nextButton = document.querySelector('.next-btn');
    
 let currentIndex =  Math.floor((images.length - 11) % 16);
    function showImage(index) {
        for (let i = 0; i < images.length; i++) {
            images[i].style.display = 'none';
        }
    
        // Afficher uniquement l'image avec l'index spécifié
        if (index >= 0 && index < images.length) {
            images[index].style.display = 'block';
        }
    }

    function goToPreviousImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
    }

    function goToNextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }

    // Afficher l'image correspondante à l'index actuel au chargement de la page
    showImage(currentIndex);

    // Gérer les clics sur les boutons précédent et suivant
    prevButton.addEventListener('click', goToPreviousImage);
    nextButton.addEventListener('click', goToNextImage);
});

jQuery(document).ready(function($) {
    // Initialiser Select2
    $('.postform').select2();

    // Ajouter une classe au survol
    $('.select2-results__option').on('mouseover', function() {
        $(this).addClass('hover');
    }).on('mouseout', function() {
        $(this).removeClass('hover');
    });
});


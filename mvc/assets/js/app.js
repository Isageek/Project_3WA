

/**header search form/register/login*/

let searchForm = document.querySelector("#search-form");
    
    
    document.querySelector('#search-btn').onclick = () =>{
        searchForm.classList.toggle("active");
        loginForm.classList.remove("active-login");
        register.classList.remove("active-register");
        navbar.classList.remove("active");
    };
    
    
let loginForm = document.querySelector("#login-form");
    
    
    document.querySelector('#login-btn').onclick = () =>{
        loginForm.classList.toggle("active-login");
        searchForm.classList.remove("active");
        register.classList.remove("active-register");
        navbar.classList.remove("active");
    };
    
    
let register = document.querySelector("#register");
    
    
    document.querySelector('#cart-btn').onclick = () =>{
        register.classList.toggle("active-register");
        searchForm.classList.remove("active");
        loginForm.classList.remove("active-login");
        navbar.classList.remove("active");
    };
    
    
    /** navbar responsive*/
let navbar = document.querySelector("#navbar");
    
    
    document.querySelector('#menu-btn').onclick = () =>{
        navbar.classList.toggle("active");
        searchForm.classList.remove("active");
        loginForm.classList.remove("active-login");
        register.classList.remove("active-register");
    };
    
    /** page scroll*/
    window.onscroll = () =>{
        searchForm.classList.remove("active");
        loginForm.classList.remove("active-login");
        register.classList.remove("active-register");
        navbar.classList.remove("active");
    };
    
    
    
   
    /**page chrono_Blog*/
    
function getChrono(){
    
    const now = new Date().getTime();
    const countdownDate = new Date('august 1, 2022').getTime();
    const distanceBase = countdownDate-now; 
    
    const days = Math.floor(distanceBase / (1000*60*60*24));
    const hours = Math.floor((distanceBase % (1000*60*60*24)) / (1000*60*60));
    const minutes = Math.floor((distanceBase % (1000*60*60)) /(1000*60));
    const seconds = Math.floor((distanceBase % (1000*60)) / (1000));
    
    var elementdays = document.getElementById("days");
    if(elementdays) {
           elementdays.innerText = days;
    
        var elementhours = document.getElementById("hours");
        elementhours.innerText = hours;
        
        var elementminutes = document.getElementById("minutes");
        elementminutes.innerText = minutes;
        
        var elementseconds = document.getElementById("seconds");
        elementseconds.innerText = seconds;
    }
 
    };
    
    const countdownInterval = setInterval(() =>{
      getChrono()
    }, 1000);
        
    
    
    function galerie() {
        let img__slider = document.getElementsByClassName('img__slider');

        if(img__slider.length > 0 ){
            let etape = 0;
        
            let nbr__img = img__slider.length;
            
            let precedent = document.querySelector('.precedent');
            let suivant = document.querySelector('.suivant');
            
            function enleverActiveImages() {
                for(let i = 0 ; i < nbr__img ; i++) {
                    img__slider[i].classList.remove('active');
                }
            }
            
            suivant.addEventListener('click', function() {
                etape++;
                if(etape >= nbr__img) {
                    etape = 0;
                }
                enleverActiveImages();
                img__slider[etape].classList.add('active');
            });
            
            precedent.addEventListener('click', function() {
                etape--;
                if(etape < 0) {
                    etape = nbr__img - 1;
                }
                enleverActiveImages();
                img__slider[etape].classList.add('active');
            });
            
            setInterval(function() {
                etape++;
                if(etape >= nbr__img) {
                    etape = 0;
                }
                enleverActiveImages();
                img__slider[etape].classList.add('active');
            }, 3000);
        }
    }

galerie()



function addUserAtelier(id){
    let form = new FormData();
    form.append("id", id)
    fetch('./index.php?url=addUserAtelier', {
        method: 'POST',
        body: form
    }).then(x => x.text()).then(msg => {
        switch(msg.trim()){
            case 'already':
                    openModal("Vous est deja enregistré")
                break;
                
            case 'login':
                openModal("Vous devez être connecté avant toute inscription")
                break;
                case 'ok':
                    openModal("Votre inscription à bien été prise en compte")
                    break;
        }
    }).catch(x => openModal("Une erreur est survenue pendant votre inscription"))
}

let ateliers = document.querySelectorAll("[data-id]")

ateliers.forEach(element => {
    element.addEventListener('click', (e) => {
        let id = element.getAttribute('data-id')
        addUserAtelier(id)
    })
})


function openModal(message){
    var modal = document.getElementById("myModal");

    if(modal){
        var span = modal.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        window.addEventListener("click", (e) => {
              if (e.target == modal) {
                modal.style.display = "none";
              }
        })
          modal.style.display = "block";
          
          let text = modal.querySelector(".text");
          if(text){
              text.innerText = message;
          }
    }
}
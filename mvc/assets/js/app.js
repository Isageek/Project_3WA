

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
    elementdays.innerText = days;
    
    var elementhours = document.getElementById("hours");
    elementhours.innerText = hours;
    
    var elementminutes = document.getElementById("minutes");
    elementminutes.innerText = minutes;
    
    var elementseconds = document.getElementById("seconds");
    elementseconds.innerText = seconds;
    };
    
    const countdownInterval = setInterval(() =>{
      getChrono()
    }, 1000);
        
    

      
    
    
    
     
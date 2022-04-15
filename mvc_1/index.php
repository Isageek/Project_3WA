
<?php
// Router


require_once './controller/HomeController.php';





$url = $_GET['url'] ?? "home";

switch($url){
    
    // Route index.php?url=accueil
    case "home" : 
        $homeController = new HomeController();
        $homeController->home();
        break;
        
        
        
    
    case "login" : 
        $homeController = new HomeController();
        $homeController->login();
        break;
    
    case "securityLogin" : 
        $homeController = new HomeController();
        $homeController->securityLogin();
        break;
    
    case "account" : 
        $homeController = new HomeController();
        $homeController->register();
        break;
        
    default :
        echo "404";
}


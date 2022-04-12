<?php 
    require_once 'header.php'
?>

    <h1 id="index-text">Welcome, <?php if(isset($_SESSION['usersId'])){
        echo explode(" ", $_SESSION['usersName'])[0];
    }else{
        echo 'Isa Geek';
    } 
    ?> </h1>
    

<?php 
    require_once 'footer.php'
?>




<?php
// Router
session_start();


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
        $homeController->account();
        break;
        
    default :
        echo "404";
}


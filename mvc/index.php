
<?php
// Router

require_once './controller/HomeController.php';
require_once './controller/UserController.php';
require_once './controller/ProductController.php';
require_once './controller/AdminController.php';





$url = $_GET['url'] ?? "home";

switch($url){
    
    // Route index.php?url=accueil
    case "home" : 
        $homeController = new HomeController();
        $homeController->home();
        break;
        
    // Route index.php?url=login
    case "login" : 
        $userController= new UserController();
        $userController->login();
        break;
        
     // Route validation formulaire register
    case "register" : 
        $userController= new UserController();
        $userController->register();
        break;
        
    
    // Route category
    case "category" : 
        $productController= new ProductController();
        $productController->category();
        break;
        
    // Route ateliers

    case "ateliers" : 
        $productController= new ProductController();
        $productController->ateliers();
        break;
        
    // Route admin
    case "admin" : 
        $adminController= new AdminController();
        $adminController->admin();
        break;
        
    // Route update
    case "update" : 
        $adminController= new AdminController();
        $adminController->update();
        break;
    //Route valideModify
    case "valideModify" : 
        $adminController= new AdminController();
        $adminController->valideModify();
        break;
    //Route valideDelete
    case "valideDelete" : 
        $adminController= new AdminController();
        $adminController->valideDelete();
        break;
        
    default :
        echo "404";
    break;
}


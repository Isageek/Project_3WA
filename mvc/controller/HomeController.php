<?php


require_once './repository/UserRepository.php';
require_once './view/HomeView.php';


require_once './model/User.php';
require_once './model/Category.php';
require_once './model/Atelier.php';
require_once './services/Utils.php';
require_once './view/UserView.php';


class HomeController {
    
        /**affiche la page users*/

    public function home()
    {
        $utils = new Utils();
        $csrf = $utils->addCsrf();
        $view = new UserView();
        echo $view->viewUser($csrf);
    }

}
<?php

require_once './repository/UserRepository.php';
require_once './repository/CategoryRepository.php';
require_once './repository/AtelierRepository.php';

require_once './model/User.php';
require_once './model/Category.php';
require_once './model/Atelier.php';


class HomeController {
    
        /**affiche la page users*/

    public function home()
    {
        $repository = new UserRepository();
        $datas = $repository->fetchAll();
        
        $users = [];
        
        foreach($datas as $data){
            
            $user = new User();
            $user->setLastName($data['last_name']);
            $user->setFirstName($data['first_name']);
            $user->setEmail($data['email']);
            $user->setRole($data['role']);
            $user->setPassword($data['password']);
            
            $users[] = $user;
        }
        $lorient = $users[0];
    
        /**affiche la page category*/

        
        $categoryRepository = new CategoryRepository();
        $datas = $categoryRepository->fetchAll();
        
        $category = [];
        
        foreach($datas as $data){
            
            $cat = new Category();
            $cat->setId($data['id']);
            $cat->setName($data['name']);
            $cat->setDescription($data['description']);
            
            $category[] = $cat;
        }
        $poisson = $category[0];
        
        
            /**affiche la page atelier*/

        $atelierRepository = new AtelierRepository();
        $datas = $atelierRepository->fetchAll();
        
        $atelier = [];
        
        foreach($datas as $data){
            
            $shop = new Atelier();
            $shop->setId($data['id']);
            $shop->setDate($data['created_at']);
            $shop->setCategory_id($data['category_id']);
            $shop->setUrl($data['url_picture']);

            
            $atelier[] = $shop;
        }

        include './template/accueil.php';
    }
    
    
    
    public function login()
    {
        if(isset($_POST['email'], $_POST['pwd'])){
        }
        
        
        include './template/login.php';
    }
    
    
    
    public function securityLogin()
    {
        $user = new User();
        
        $user->setName($_POST["email"]);
        $user->setFirstName($_POST["firstName"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setRole('user');
        
        $repository = new UserRepository();
        $data = $repository->insertUser($user);
        
        if($data){
            $_SESSION['user'] = serialize($user);
            header('location: ./index.php?url=account');
            die();
        }
        
        header('location: ./index.php?url=login');
        die();
        
        
    }
    
    public function account()
    {
        $user = unserialize($_SESSION['user']);
        
        include './template/account.php';
    }
}
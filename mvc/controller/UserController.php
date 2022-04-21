<?php
require_once "./view/UserView.php";
require_once "./repository/UserRepository.php";
require_once './services/Utils.php';



class UserController
{
    public function register(): void
    {
        var_dump($_SESSION); die();

        $csrf = $_POST['csrf'];
        $nom = htmlspecialchars($_POST['prenom']); 
        $prenom = htmlspecialchars($_POST['nom']); 
        $email= htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']); 
        $user = new User();
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setEmail($email);
        $user->setRole('user');
        $user->setPassword($password);
        //if($_SESSION['csrf']===$csrf){
        $userRepository = new UserRepository();
        $valide = $userRepository->insertUser($user); 
        $utils = new Utils();
        $csrf = $utils->addCsrf();
        $view = new UserView();

            if($valide) {
                echo $view->viewRegister_ok($csrf);
              } else {
                echo $view-> error($csrf);
              }
        //} else {
            // echo $view-> error($csrf);
       // }
          
     }
    
    public function login()
    {
        $user = new User();
        $view = new UserView();

        $user->setEmail(htmlspecialchars($_POST['email']));
        $user->setPassword(htmlspecialchars($_POST['password']));
        $userRepository = new UserRepository();
        $data = $userRepository->fetchOneUser($user->getEmail());
        
        $csrf = '';
        if($data) {
            $utils = new Utils();
            $csrf = $utils->addCsrf();

            if(password_verify($user->getPassword(), $data['password'])){
            $user->setPrenom($data['prenom']);
            $user->setNom($data['nom']);
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setRole($data['role']);
            
            //on serialize l'objet
            $_SESSION['user']=serialize($user);

            echo $view->viewLog_ok($csrf);
            
            } else {
                
                echo $view->error($csrf);
            }  
    
        } else {
            echo $view->error($csrf);
        }
        
}

}
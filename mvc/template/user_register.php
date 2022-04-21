<?php

    require_once 'user.php';

    class Users {

        private $userModel;
        
        public function __construct(){
            $this->userModel = new User;
        }

        public function register(){
            
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'usersNom' => trim($_POST['usersNom']),
                'usersEmail' => trim($_POST['usersEmail']),
                'usersPassword' => trim($_POST['usersPassword']),
                'pwdRepeat' => trim($_POST['pwdRepeat'])
            ];

            //Validation des inputs
            if(empty($data['usersName']) || empty($data['usersEmail']) || empty($data['usersUid']) || 
            empty($data['usersPasswordwd']) || empty($data['passworddRepeat'])){
                flash("register", "Remplir tous les champs");
                redirect("../signup.php");
            }

            if(!preg_match("/^[a-zA-Z0-9]*$/", $data['usersUid'])){
                flash("register", " nom Invalide");
                redirect("../register.php");
            }

            if(!filter_var($data['usersEmail'], FILTER_VALIDATE_EMAIL)){
                flash("register", " email invalide");
                redirect("../register.php");
            }

            if(strlen($data['usersPwd']) < 6){
                flash("register", "mot de passe invalide");
                redirect("../register.php");
            } else if($data['usersPassword'] !== $data['passwordRepeat']){
                flash("register", "mot de passe invalide");
                redirect("../register.php");
            }

            //User with the same email or password already exists
            if($this->userModel->findUserByEmailOrUsername($data['usersEmail'], $data['usersNom'])){
                flash("register", "nom ou email indisponible");
                redirect("../register.php");
            }

            //Passed all validation checks.
            //Now going to hash password
            $data['usersPwd'] = password_hash($data['usersPwd'], PASSWORD_DEFAULT);

            //Register User
            if($this->userModel->register($data)){
                redirect("../login.php");
            }else{
                die("une erreur est survenue");
            }
        }

    public function login(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data=[
            'nom/email' => trim($_POST['nom/email']),
            'usersPassword' => trim($_POST['usersPassword'])
        ];

        if(empty($data['nom/email']) || empty($data['usersPassword'])){
            flash("login", "Please fill out all inputs");
            header("location: ../login.php");
            exit();
        }

        //Check for user/email
        if($this->userModel->findUserByEmailOrUsername($data['nom/email'], $data['nom/email'])){
            
            //User trouvé
            $loggedInUser = $this->userModel->login($data['nom/email'], $data['usersPwd']);
            if($loggedInUser){
                
            //Créer session
                $this->createUserSession($loggedInUser);
            }else{
                flash("login", "Password Incorrect");
                redirect("../login.php");
            }
        }else{
            flash("login", "aucun utilisateur");
            redirect("../login.php");
        }
    }

    public function createUserSession($user){
        $_SESSION['usersId'] = $user->usersId;
        $_SESSION['usersNom'] = $user->usersName;
        $_SESSION['usersEmail'] = $user->usersEmail;
        redirect("../index.php");
    }

    public function logout(){
        unset($_SESSION['usersId']);
        unset($_SESSION['usersNom']);
        unset($_SESSION['usersEmail']);
        session_destroy();
        redirect("../index.php");
    }
}

    $init = new Users;

    //Ensure that user is sending a post request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        switch($_POST['type']){
            case 'register':
                $init->register();
                break;
            case 'login':
                $init->login();
                break;
            default:
            redirect("../index.php");
        }
        
    }else{
        switch($_GET['q']){
            case 'logout':
                $init->logout();
                break;
            default:
            redirect("../index.php");
        }
    }

    

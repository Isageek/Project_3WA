<?php
require_once './view/AdminView.php';
require_once './controller/UserController.php';
require_once './view/HomeView.php';


class AdminController
{
    public function admin(): void
    {
        $view = new AdminView();
        $utils = new Utils();
        $csrf = $utils->addCsrf();
        //if($this->verifyAdmin()==='ok'){
        echo $view->afficheAdmin($csrf); die();
        //}
        //echo $view->constructAccueil();
    }
    
    public function verifyAdmin()
    {
        if(isset($_SESSION["user"])){
        $user = unserialize($_SESSION["user"]);
        $repository = new UserRepository();
        $data = $repository->fetchOneUser($user->getEmail());
       if($data["role"]==='admin'){
            return 'ok';
        }
        }else{ 
            $view = new HomeView();
            echo $view->constructAccueil();
        }
    }
    public function update(): void
    {
        $view = new AdminView();
        $utils = new Utils();
        $csrf = $utils->addCsrf();
        //if($this->verifyAdmin()==='ok'){
        $repository= new ProductRepository();
        $data = $repository->fetchAteliers();
        echo $view->afficheAtelierAdmin($data, $csrf); die();
        //}
        //echo $view->constructAccueil();
    }
    public function valideModify(): void
    {var_dump('yes');die();
        $created_at= htmlspecialchars($_POST['created_at']);
        $category_id= htmlspecialchars($_POST['category_id']);
        $url_picture= htmlspecialchars($_POST['url_picture']);
        $id = htmlspecialchars($_POST['id']);

        $view = new AdminView();
        $utils = new Utils();
        $csrf = $utils->addCsrf();
        //if($this->verifyAdmin()==='ok'){
        
        $repository= new ProductRepository();
        $valide = $repository->updateAtelier($created_at, $category_id, $url_picture, $id);
        echo $view->afficheAdmin($csrf); die();
        //}
        //echo $view->constructAccueil();
    }
    public function valideDelete(): void
    { 
        $id = htmlspecialchars($_POST['id']);

        $utils = new Utils();
        $csrf = $utils->addCsrf();
        $view = new AdminView();
        //if($this->verifyAdmin()==='ok'){
        
        $repository= new ProductRepository();
        $valide = $repository->DeleteAtelier($id);
        echo $view->afficheAdmin($csrf); die();
        //}
        //echo $view->constructAccueil();
    }
    
}
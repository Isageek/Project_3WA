<?php 

require_once './model/User.php';
require_once './model/Atelier.php';
require_once './model/Category.php';

require_once './repository/UserRepository.php';
require_once './repository/CategoryRepository.php';
require_once './repository/AtelierRepository.php';



class AdminController {
    
    private User $user;
    private Atelier $atelier;
    private Category $category;

    
    public function user()
    {
        $repository = new UserRepository();
        $data = $repository->fetchAll();
    }
    
    
    public function atelier()
    {
        $repository = new AtelierRepository();
        $data = $repository->fetchAll();
    }
    
    public function Category()
    {
        $repository = new CategoryRepository();
        $data = $repository->fetchAll();

    }
}
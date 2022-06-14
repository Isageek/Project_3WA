<?php
require_once './view/AproposView.php';

class AproposController{
    
    public function apropos(): void
    {
        $aproposController = new AproposController();
        $view = new AproposView();
        echo $view->afficheApropos();
    }
}
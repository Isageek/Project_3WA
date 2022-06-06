<?php
require_once './view/A_proposView.php';

class AproposController{
    
    public function apropos(): void
    {
        $aproposController = new AproposController();
        $view = new AproposView();
        echo $view->afficheApropos();
    }
}
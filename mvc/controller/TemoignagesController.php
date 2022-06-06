<?php
require_once './view/TemoignagesView.php';

class TemoignagesController{
    
    public function temoignages(): void
    {
        $temoignagesController = new TemoignagesController();
        $view = new TemoignagesView();
        echo $view->afficheTemoignages();
    }
}
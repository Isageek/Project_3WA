<?php
class TemoignagesController{
    public function review(): void
    {
        $view = new ReviewView();
        echo $view->afficheTemoignages();
    }
    
    }
<?php
require_once './view/NewsletterView.php';

class NewsletterController{
    
    public function newsletter(): void
    {
        $newsletterController = new NewsletterController();
        $view = new NewsletterView();
        echo $view->afficheNewsletter();
    }
}
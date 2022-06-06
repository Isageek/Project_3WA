<?php
require_once './view/BlogView.php';

class BlogController{
    
    public function blog(): void
    {
        $blogController = new BlogController();
        $view = new BlogView();
        echo $view->afficheBlog();
    }
}
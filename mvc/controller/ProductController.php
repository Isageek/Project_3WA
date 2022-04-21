<?php
require_once "./view/ProductView.php";
require_once "./repository/ProductRepository.php";


class ProductController
{
    public function category(): void
    {
        $productRepository = new ProductRepository();
        $data = $productRepository->fetchCategory();
        $view = new ProductView();
        echo $view->afficheCategory($data);

          
     }
     public function ateliers(): void
    {
        $productRepository = new ProductRepository();
        $data = $productRepository->fetchAteliers();
        $view = new ProductView();
        echo $view->afficheAteliers($data);
          
     }

}
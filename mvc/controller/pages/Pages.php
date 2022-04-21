<?php
  class Pages extends Controller {
    public function __construct(){
 
    }
 
    public function accueil(){
      if(isLoggedIn()){
        redirect('accueil');
      }
      $data = [
        'title' => 'Accueil',
        'description' => 'Laissez-nous vous surprendre dans nos ateliers',
        'info' => 'Viande, poisson, légumes, cuisinés avec des épices qui donnent une saveur inoubliable à vos plats',
        'location' => 'Angers 49100',
        'contact' => '09 34 21 07 45',
        'mail' => 'atelierssoleil@gmail.com'
      ];
 
      $this->view('template/header.php', $data);
    }
    
public function about(){
      $data = [
        'title' => 'Blog',
        'description' => 'pages des actualités'
      ];
 
      $this->view('pages/blog', $data);
    }
 
    public function Recherche(){
      $data = [
          'title' => 'recherche',
          'description' => 'Trouver votre saveur',
          'info' => 'Des produits exotiques sont bien agencés par vous mêmes pour émerveiller vos papilles',
          'location' => 'Angers 49100',
          'contact' => '09 34 21 07 45',
          'mail' => 'atelierssoleil@gmail.com'
      ];
 
      $this->view('pages/ateliers', $data);
    }
  }
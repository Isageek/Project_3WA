<?php 

require_once "./repository/AbstractRepository.php";

class CategoryRepository extends AbstractRepository {
    
    
    public function fetchAll()
    {
        $data = null;
        try {
            /**écrire et préparer la requête*/
            
            $query = $this->connexion->query('SELECT * FROM category');
            if ($query) {
                
                /** stocker le résult dans un tableau*/
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            die($e);
        }
        
        return $data;
    }
}
<?php 

require_once "./repository/AbstractRepository.php";

class AtelierRepository extends AbstractRepository {
    
    
    public function fetchAll()
    {
        $data = null;
        try {
            /**écrire et préparer la requête*/
            
            $query = $this->connexion->query('SELECT * FROM atelier');
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
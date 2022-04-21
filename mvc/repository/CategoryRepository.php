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
        }
        
        return $data;
    }
    
    /**
    * update
    */
    
    public function InsertCat($category)
    {
        try {
            $query = $this->connexion->query('UPDATE category SET description = :description WHERE id = :id');
            
            if ($query) {
                
                $query->bindValue(':id', $category-> getId());
                $query->bindValue(':description', $category-> getDescription());
                
                return $query->execute();
            }
        }
        catch (Exception $e) {
            
            return $e ;
        }
    }
    
}


    
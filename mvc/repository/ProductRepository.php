<?php 

require_once "./repository/AbstractRepository.php";

class ProductRepository extends AbstractRepository {
    public function fetchCategory()
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
    
    
    public function fetchAteliers()
    {
        $data = null;
        try {
            /**écrire et préparer la requête*/
            
            $query = $this->connexion->query('SELECT * FROM atelier a JOIN category c on a.category_id WHERE a.category_id = c.id');
            if ($query) {
                
                /** stocker le résult dans un tableau associatif*/
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
        
        }
        return $data;
    }
    /**
    * modifier
    */
    public function InsertShop($atelier)
    {
        try {
            $query = $this->connexion->query('UPDATE posts SET category_id = :category_id, created_at = :body WHERE id = :id');
            
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
    
    /**
    * supprimer
    */
    public function DeleteShop($atelier){
        $query = $this->connexion->query('DELETE FROM atelier WHERE id = :id');
        $this->db->bind(':id', $id);
 
        if ($query) {
                
                $query->bindValue(':id', $category-> getId());
                $query->bindValue(':description', $category-> getDescription());
                
                return $query->execute();
            }
        }
        
    }
    







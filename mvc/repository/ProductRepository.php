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
            
            $query = $this->connexion->query('SELECT a.id, a.created_at, a.category_id, a.url_picture, c.name, c.description FROM atelier a JOIN category c on a.category_id WHERE a.category_id = c.id');
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
    public function updateAtelier($created_at, $category_id, $url_picture, $id)
    {
        $data = null;
        try {
            /**écrire et préparer la requête*/
            
            $query = $this->connexion->prepare('UPDATE atelier SET created_at=:created_at, category_id=:category_id, url_picture=:url_picture WHERE id=:id');
            
                $query->bindParam(':created_at', $created_at);
                $query->bindParam(':category_id', $category_id);
                $query->bindParam(':url_picture', $url_picture);
                $query->bindParam(':id', $id);
                $data = $query->execute();
                return $data;
        } catch (Exception $e) {
        }
        return $data;
   }
   public function deleteAtelier($id)
    {
        $data = null;
        try {
            /**écrire et préparer la requête*/
            
            $query = $this->connexion->prepare('DELETE FROM atelier WHERE id=:id');
            
                $query->bindParam(':id', $id);
                $data = $query->execute();
                return $data;
        } catch (Exception $e) {
            die($e);
        }
        return $data;
   }
   
   //INSERT INTO `inscription_atelier`(`user_id`, `atelier_id`) VALUES (':user',':atelier')
   
       public function InsertUserAtelier($user, $atelier)
    {
        try {
            $verify = $this->alreadyInAtelier($user, $atelier);

            if($verify || is_null($verify)){
                return null;
            }
            
            $query = $this->connexion->prepare("INSERT INTO inscription_atelier(`user_id`, `atelier_id`) VALUES (:user, :atelier)");
            
            if ($query) {
                
                $query->bindValue(':user', $user);
                $query->bindValue(':atelier', $atelier);
                
                return $query->execute();
            }
            
 
        }
        catch (Exception $e) {
            
            return $e ;
        }
    }
    
    public function alreadyInAtelier($user, $atelier)
    {
        try {
            $query = $this->connexion->prepare("SELECT * from inscription_atelier WHERE user_id = :user AND atelier_id = :atelier");
            
            if ($query) {
                $query->bindValue('user', $user);
                $query->bindValue('atelier', $atelier);
                
                $query->execute();
                return $query->fetch(PDO::FETCH_ASSOC);
            }
        }
        catch (Exception $e) {
            
            return $e ;
        }
    }
}
<?php 

require_once "./repository/AbstractRepository.php";

class UserRepository extends AbstractRepository {
    
    public function fetchAll()
    {
        $data = null;
        try {
            $query = $this->connexion->query('SELECT * FROM users');
            
            if ($query) {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            die($e);
        }
        
        return $data;
    }
    
    
    
    public function insertUser($user): bool
    {
            $password = password_hash($password, PASSWORD_BCRYT);

        try {
            $query = $this->connexion->prepare('INSERT INTO users (last_name, first_name, email, password, role) 
                                                VALUES (:lastName, :firstName, :email, :password, :role )');
            if ($query) {
                $query->bindValue(':lastNamename', $user->getLastName());
                $query->bindValue(':firstName', $user->getFirstName());
                $query->bindValue(':email', $user->getEmail());
                $query->bindValue(':password', $user->getPassword());
                $query->bindValue(':role', $user->getRole());
                
                return $query->execute();
            }
        } catch (Exception $e) {
            return false;
        }
    }
    
    

}
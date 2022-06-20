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
    
    public function insertUser($user): bool|PDOstatement
    {
            $password = password_hash($user->getPassword(), PASSWORD_BCRYPT);
            $user->setPassword($password);

        try {
            $query = $this->connexion->prepare('INSERT INTO users (prenom, nom, email, password, role) VALUES (:prenom, :nom, :email, :password, :role )');
            if ($query) {
                $query->bindValue(':prenom', $user->getPrenom());
                $query->bindValue(':nom', $user->getNom());
                $query->bindValue(':email', $user->getEmail());
                $query->bindValue(':password',$user->getPassword());
                $query->bindValue(':role', $user->getRole());
                
                return $query->execute();
            }
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function fetchOneUser($mail)
    {
        $data = null;
        try {
            $query = $this->connexion->prepare('SELECT * FROM users WHERE email=:email');
            
            if ($query) {
                $query-> bindValue(':email', $mail);
                $query->execute();

                $data = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
        }
        
        return $data;
    }

}
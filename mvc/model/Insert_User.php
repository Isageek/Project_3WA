

<?php
require_once "./repository/AbstractRepository.php";

class User {
    private $db;
    public function __construct()
    {
        
    
 
    //register new user
    public function register($data)
    {
        $this->db->query('INSERT INTO user (nom, email, password) VALUES (:name, :email, :password)');
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
 
        if($this->db->execute()){
            return true;
        }else{
            return false;
    }
    
    
//find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
 
        $row = $this->db->single();
 
        //check the row 
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


public function login($email, $password){
        $this->db->query('SELECT * FROM users where email = :email');
        $this->db->bind(':email', $email);
 
        $row = $this->db->single();
 
        $hash_password = $row->password;
 
        if(password_verify($password, $hash_password)){
            return $row;
        }else{
            return false;
        }
    }
    
public function getUserById($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
 
        $row = $this->db->single();
 
        return $row;
    }
    
    
    public function getUserByNom($nom){
        $this->db->query('SELECT * FROM users WHERE nom = :nom');
        $this->db->bind(':nom', $nom);
 
        $row = $this->db->single();
 
        return $row;
    }
}
    


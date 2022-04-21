<?php
class User {
    
    
    private int $id;
    
    private string $prenom;
    
    private string $nom;
    
    private string $email;
    
    private string $password;
    
    private string $role;
    
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @param int $id 
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    
    /**
     * @param string $nom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }
    
    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }
    
    /**
     * @param string $nom 
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
    
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    
    /**
     * @param string $email 
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    
    /**
     * @param string $password 
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    
    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }
    
    /**
     * @param string $role 
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}
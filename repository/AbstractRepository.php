<?php

abstract class AbstractRepository
{
    
    private const SERVER = "db.3wa.io";
    private const USER = "isabellecoyssi";
    private const PASSWORD = "9224f2af0f1000ec0a0c47d70291eb9a";
    private const BASE = "isabellecoyssi_atelier";
    
    protected $connexion;
    protected $query;

    public function __construct()
    {
        $this->constructConnexion();
    }
    
    private function constructConnexion(){
        
        try {
            
            $this->connexion = new PDO("mysql:host=" . self::SERVER . ";dbname=" . self::BASE, self::USER, self::PASSWORD);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $this->connexion->exec("SET CHARACTER SET utf8");
    }
}
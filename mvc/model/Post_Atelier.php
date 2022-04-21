<?php
 
class Post {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
 
   
public function addAtelier($data){
        $this->db->query('INSERT INTO posts( created_at, category_id, url_picture) VALUES (:created_at, :category_id, :url_picture)');
        $this->db->bind(':created_at', $data['created_at']);
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':url_picture', $data['url_picture']);
 
        //execute 
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
 
    public function getPostById($id){
        $this->db->query('SELECT * FROM atelier WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
 
        return $row;
    }

public function updatePost($data){
        $this->db->query('UPDATE posts SET category_id = :category_id, created_at = :body WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
 
        //execute 
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
 
    //delete a post
    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
 
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}

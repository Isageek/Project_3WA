<?php 

class Category {
    
    
    private int $id;
    
    private string $name;
    
    private string $description;
    
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @param int $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
}
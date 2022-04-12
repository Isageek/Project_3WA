
<?php 

class Atelier {
    
    
    private int $id;
    
    private string $date;
    
    private int $category_id;
    
    private string $url_picture;

    
    
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
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * @param int $datetime
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    
    /**
     * @return int
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }
    
    /**
     * @param string $url_picture
     */
    public function setUrl($url)
    {
        $this->url_picture = $url;
    }
    
    /**
     * @return string
     */
    public function getUrl_picture()
    {
        return $this->url_picture;
    }
    
    /**
     * @param int $category_id
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }
    
}
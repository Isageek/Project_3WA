<?php


class ProductView
{
    private $header;
    private $body;
    private $footer;
    private $template;
    private $category;
    private $atelier;


    /**
    * @params string $header
    */
    
    public function setHeader($header)
    {
        $this->header= $header;
        
    }
    
    /**
     * return string $this->header
     */
    public function getHeader()
    {
        return $this->header;
    }
    
    /**
    * @params string $body
    */
    public function setBody($body)
    {
        $this->body = $body;
        
    }
    /**
     * return string $this->body
     */
    public function getBody()
    {
        return $this->body;
    }
    /**
    * @params string $footer
    */
    public function setFooter($footer)
    {
        $this->footer= $footer;
        
    }
    /**
     * return string $this->footer
     */
    public function getFooter()
    {
        return $this->footer;
    }
    /**
    * @params string $template
    */
    public function setTemplate($template)
    {
        $this->template=$template;
        
    }
    /**
     * return string $this->template
     */
    public function getTemplate()
    {
        return $this->template;
    }
    /**
    * @params string $atelier
    */
    public function setAtelier($atelier)
    {
        $this->atelier=$atelier;
        
    }
    /**
     * return string $this->atelier
     */
    public function getAtelier()
    {
        return $this->atelier;
    }
    /**
    * @params string $category
    */
    public function setCategory($category)
    {
        $this->category=$category;
        
    }
    /**
     * return string $this->category
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     *@params sarray $datas
     *@params array $datas2
     *return  string template
     */
    public function afficheCategory($datas)
    {
    
        $this->setHeader(file_get_contents("./template/header.html"));
        $this->setFooter(file_get_contents("./template/footer.html"));
        $this->setBody(file_get_contents("./template/categorys.html"));

        
        //var_dump($this->getFooter()); die();
        $cat = '';
        foreach ($datas as $data) {
            
            $this->setCategory(file_get_contents("./template/category.html"));
            $this->setCategory(str_replace ('{%id%}', $data['id'], $this->getCategory()));
            $this->setCategory(str_replace ('{%name%}', $data['name'], $this->getCategory()));
            $this->setCategory(str_replace ('{%description%}', $data['description'], $this->getCategory()));
            $cat .= $this->getCategory();
        
        }
        $this->setBody(str_replace('{%category%}', $cat, $this->getBody()));
        $this->setTemplate($this->getHeader().$this->getBody().$this->getFooter());
        //var_dump($this->getTemplate()); die();
        return $this->getTemplate(); 
    }
    public function afficheAteliers($datas2)
    {
        $shop='';
        $this->setHeader(file_get_contents("./template/header.html"));
        $this->setFooter(file_get_contents("./template/footer.html"));
        $this->setBody(file_get_contents("./template/ateliers.html"));
        foreach ($datas2 as $data2) {
            
            $this->setAtelier(file_get_contents("./template/atelier.html"));
            $this->setAtelier(str_replace ('{%id2%}', $data2['id'], $this->getAtelier()));
            $this->setAtelier(str_replace ('{%created_at%}', $data2['created_at'], $this->getAtelier()));
            
            $this->setAtelier(str_replace ('{%category_id%}', $data2['category_id'], $this->getAtelier()));
            $this->setAtelier(str_replace ('{%url_picture%}', $data2['url_picture'], $this->getAtelier()));
            $this->setAtelier(str_replace ('{%name%}', $data2['name'], $this->getAtelier()));
            $this->setAtelier(str_replace ('{%description%}', $data2['description'], $this->getAtelier()));
        
            $shop .= $this->getAtelier();
    
    }
    
        $this->setBody(str_replace('{%ateliers%}', $shop, $this->getBody()));
        $this->setTemplate($this->getHeader().$this->getBody().$this->getFooter());

        return $this->getTemplate().$this->getBody().$this->getFooter();
    }
}
<?php

class AdminView
{
    private $header;
    private $body;
    private $footer;
    private $template;
    private $modify;
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
    * @params string $modify
    */
    public function setModify($modify)
    {
        $this->modify=$modify;
        
    }
    /**
     * return string $this->modify
     */
    public function getModify()
    {
        return $this->modify;
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
    *return string $contents
    */
    public function afficheAdmin($csrf)
    {
        //var_dump($_SESSION);die();
        $this->setHeader(file_get_contents("./template/headerAdmin.html"));
        $this->setBody(file_get_contents("./template/edit.html"));
        $this->setBody(str_replace("{%csrf%}",$csrf, $this->getBody()));
        $this->setFooter(file_get_contents("./template/footerAdmin.html"));
        $this->setTemplate($this->getHeader().$this->getBody().$this->getFooter());
        return $this->getTemplate();
        
    }
    public function afficheAtelierAdmin($datas2, $csrf)
    {
        //var_dump($_SESSION);die();
        $shop="";
        foreach ($datas2 as $data2) {
            
            $this->setAtelier(file_get_contents("./template/atelierToModify.html"));
            $this->setAtelier(str_replace ('{%id2%}', $data2['id'], $this->getAtelier()));
            $this->setAtelier(str_replace ('{%created_at%}', $data2['created_at'], $this->getAtelier()));
            
            $this->setAtelier(str_replace ('{%category_id%}', $data2['category_id'], $this->getAtelier()));
            $this->setAtelier(str_replace ('{%url_picture%}', $data2['url_picture'], $this->getAtelier()));
            $this->setAtelier(str_replace ('{%name%}', $data2['name'], $this->getAtelier()));
            $this->setAtelier(str_replace ('{%description%}', $data2['description'], $this->getAtelier()));
        
            $shop .= $this->getAtelier();
    
            }
        $this->setModify($shop);
        $this->setHeader(file_get_contents("./template/headerAdmin.html"));
        $this->setBody(file_get_contents("./template/productModify.html"));
        $this->setBody(str_replace("{%csrf%}",$csrf, $this->getBody()));
        $this->setBody(str_replace("{%atelier%}",$this->getModify(), $this->getBody()));

        $this->setFooter(file_get_contents("./template/footerAdmin.html"));
        $this->setTemplate($this->getHeader().$this->getBody().$this->getFooter());
        return $this->getTemplate();
        
    }
    
}
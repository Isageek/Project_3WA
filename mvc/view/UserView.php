<?php

class UserView
{
    private $header;
    private $body;
    private $footer;
    private $template;
    
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
    *return string $contents
    */
    public function viewUser($csrf)
    {
        //var_dump($_SESSION);die();
        $this->setHeader(file_get_contents("./template/header.html"));
        $this->setBody(file_get_contents("./template/accueil.html"));
        $this->setHeader(str_replace("{%csrf%}",$csrf, $this->getHeader()));
        $this->setFooter(file_get_contents("./template/footer.html"));
        $this->setTemplate($this->getHeader().$this->getBody().$this->getFooter());
        return $this->getTemplate();$contents = file_get_contents("./template/register.html");
        
    }
     public function viewRegister_ok($csrf)
    {
        $this->setHeader(file_get_contents("./template/header.html"));
        $this->setBody(file_get_contents("./template/register_ok.html"));
        $this->setHeader(str_replace("{%csrf%}",$csrf, $this->getHeader()));
        $this->setFooter(file_get_contents("./template/footer.html"));
        $this->setTemplate($this->getHeader().$this->getBody().$this->getFooter());
        return $this->getTemplate();
        
    }
    public function viewLog_ok($csrf)
    {
        $this->setHeader(file_get_contents("./template/header.html"));
        $this->setBody(file_get_contents("./template/login_ok.html")); 
        $this->setHeader(str_replace("{%csrf%}",$csrf, $this->getHeader()));
        $this->setFooter(file_get_contents("./template/footer.html"));
        $this->setTemplate($this->getHeader().$this->getBody().$this->getFooter());
        return $this->getTemplate();
        
    }
    public function error($csrf)
    {
        $this->setHeader(file_get_contents("./template/header.html"));
        $this->setBody(file_get_contents("./template/error.html")); 
        $this->setHeader(str_replace("{%csrf%}",$csrf, $this->getHeader()));
        $this->setFooter(file_get_contents("./template/footer.html"));
        $this->setTemplate($this->getHeader().$this->getBody().$this->getFooter());
        return $this->getTemplate();
        
    }
}


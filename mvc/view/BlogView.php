<?php

class BlogView
{
    private $header;
    private $body;
    private $footer;
    private $template;
    private $blog;


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
    * @params string $blog
    */
    public function setBlog($blog)
    {
        $this->blog=$blog;
        
    }
    /**
     * return string $this->blog
     */
    public function getBlog()
    {
        return $this->blog;
    }
    
    public function afficheBlog()
    {
        $actus='';
        $this->setHeader(file_get_contents("./template/header.html"));
        $this->setFooter(file_get_contents("./template/footer.html"));
        $this->setBody(file_get_contents("./template/blog.html"));
        
        $this->setBlog(file_get_contents("./template/blog.html"));
        $actus = $this->getBlog();
        
        {
        $this->setBody(str_replace('{%blog%}', $actus, $this->getBody()));
        $this->setTemplate($this->getHeader().$this->getBody().$this->getFooter());
        return $this->getTemplate();
        }
    }

}

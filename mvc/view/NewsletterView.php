<?php

class NewsletterView
{
    private $header;
    private $body;
    private $footer;
    private $template;
    private $temoignages;
    private $newsletter;


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
    * @params string $newsletter
    */
    public function setNewsletter($newsletter)
    {
        $this->newsletter=$newsletter;
        
    }
    /**
     * return string $this->newsletter
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }
    
    public function afficheNewsletter()
    {
        $journal='';
        $this->setHeader(file_get_contents("./template/header.html"));
        $this->setFooter(file_get_contents("./template/footer.html"));
        $this->setBody(file_get_contents("./template/newsletter.html"));
            
        $this->setNewsletter(file_get_contents("./template/newsletter.html"));
        $review = $this->getNewsletter();
        
        {
        $this->setBody(str_replace('{%newsletter%}', $review, $this->getBody()));
        $this->setTemplate($this->getHeader().$this->getBody().$this->getFooter());
        return $this->getTemplate();
        }
    }

}

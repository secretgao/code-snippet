<?php 

class Logger {
    
    static function getInstance()
    {
        if (self::$instance == NULL) 
        {
            self::$instance = new Logger();
        }
        return self::$instance;
    }
    
    private function __construct()
    {
        echo '__construct';
    }
    
    private function __clone()
    {
        
    }
    
    function Log($param){
        echo $param;
    }
    static private $instance = NULL;
}

Logger::getInstance()->Log('log');

?>
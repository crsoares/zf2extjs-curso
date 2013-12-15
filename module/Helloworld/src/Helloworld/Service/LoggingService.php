<?php

namespace Helloworld\Service;

class LoggingService implements LoggingServiceInterface
{
    private $logfile = null;
    
    public function __construct($logfile)
    {
        $this->logfile = $logfile;
    }
    
    public function log($str)
    {
        file_put_contents($this->logfile, $str, FILE_APPEND);
    }
    
    public function onGetGreeting()
    {
        echo "Salvar log";
    }
}

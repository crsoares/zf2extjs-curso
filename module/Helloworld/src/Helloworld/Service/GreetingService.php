<?php

namespace Helloworld\Service;

class GreetingService
{
    public function getGreeting()
    {
        if(date('H') <= 11) {
            return "Bom dia, mundo!";
        }elseif(date('H') > 11 && date('H') < 17) {
            return "Olá, mundo!";
        }else {
            return "Boa noite, mundo!";
        }
    }
}
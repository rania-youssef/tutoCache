<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use App\Taxes\Calculator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{

    protected  $calculator;
    
    public function __construct(Calculator $calculator)
    {
        $this->calculator=$calculator;
        
    }


    /**
     * @Route("/hello/{prenom?World}",name="hello")
     */
    public function hello($prenom,loggerInterface $logger){
        $tva=$this->calculator->calcul(220);
        
      
        return new Response("Hello $tva");
    }
}


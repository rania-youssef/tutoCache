<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Stopwatch\Stopwatch;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(Stopwatch $stopwatch,CacheInterface $cache)
    {
        $stopwatch->start('calcul-long');
        $resultat=$cache->get("resultat_calcul_long",function(ItemInterface $item){
        $item->expiresAfter(3600);


            return($this->fonctionQuiPrendDuTemps());
        });
        // On imagine un calcul ou un traitement long
       

        $event=$stopwatch->stop('calcul-long');
       
        return $this->render("resultat.html.twig",["resultat"=>$resultat]);
    }

    private function fonctionQuiPrendDuTemps(): int
    {
        sleep(2);
        return 10;
    }
}

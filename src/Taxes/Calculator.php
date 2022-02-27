<?php
 namespace App\Taxes;
class Calculator {


    public function calcul(float $prix)
    {
        return $prix *(20/100);
    }
}
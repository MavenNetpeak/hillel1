<?php

namespace App\Services;

class DeliveryCalculator
{
    private $weight;
    private $lenght;
    private $width;
    private $height;
    private $sellerPrice;
    private $calculationMethod;

    public function setWeight($weight){
        $this->weight = $weight;
    }

    public function setDimensions($lenght, $width, $height){
        $this->lenght = $lenght;
        $this->width = $width;
        $this->height = $height;
    }
    public function setSellerPrice($price)
    {
        $this->price = $price;
    }

    public function calculateDeliveryCost(){
        $weightCost = $this->weight * 50;
        $volumeCost = ($this->lenght * $this->width * $this->height) / 1000*50;

        $calculatedCost = max($weightCost, $volumeCost, $this->sellerPrice);

        if ($calculatedCost == $weightCost) {
            $this->calculationMethod = 'Weight';
        } elseif ($calculatedCost == $volumeCost){
            $this->calculationMethod = 'Volume';
        } else {
            $this->calculationMethod = 'Seller Price';
        }
        return $calculatedCost;

    }
    public function getCalculationMethod(){
        return $this->calculationMethod;
    }
}

$delivery = new DeliveryCalculator();
$delivery->setWeight(1);
$delivery->setDimensions(20, 20, 20);
$delivery->setSellerPrice(40);
$cost=$delivery->calculateDeliveryCost();
$method=$delivery->getCalculationMethod();
var_dump($cost, $method);

<?php

namespace App\Http\Controllers;

use App\Services\DeliveryCalculator;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function calculate()
    {
        $delivery = new DeliveryCalculator();
        $delivery->setWeight(1);
        $delivery->setDimensions(20, 20, 20);
        $delivery->setSellerPrice(40);
        $cost = $delivery->calculateDeliveryCost();
        $method = $delivery->getCalculationMethod();

        return response()->json(['cost' => $cost, 'method' => $method]);
    }
}

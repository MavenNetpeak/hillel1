<?php

namespace App\Http\Controllers;

use App\Services\Context;
use App\Strategies\ConcreteStrategy1;
use App\Strategies\ConcreteStrategy2;

class StrategyController extends Controller
{
    public function index()
    {
        $data = [
            // Замініть це вашими даними
            (object)["brandName" => "Ford", "model" => "Mustang", "modelYear" => 2014],
            (object)["brandName" => "BMW", "model" => "520i", "modelYear" => 2001],
            (object)["brandName" => "Toyota", "model" => "Camry", "modelYear" => 2018],
            (object)["brandName" => "Audi", "model" => "A4", "modelYear" => 2020],
        ];

        $context = new Context(new ConcreteStrategy1());
        $result1 = $context->executeStrategy($data);

        $context->setStrategy(new ConcreteStrategy2());
        $result2 = $context->executeStrategy($data);


        return view('strategy', ['result1' => $result1, 'result2' => $result2]);
    }
}

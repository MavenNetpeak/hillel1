<?php

namespace App\Services;

use App\Interfaces\StrategyInterface;

class Context
{
    private $strategy;

    public function __construct(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy(array $data): string
    {
        return $this->strategy->formatData($data);
    }
}

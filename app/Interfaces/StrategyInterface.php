<?php

namespace App\Interfaces;

interface StrategyInterface
{
    public function formatData(array $data): string;
}

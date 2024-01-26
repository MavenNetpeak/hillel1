<?php

namespace App\Strategies;

class ConcreteStrategy1 extends AbstractStrategy
{
    public function formatData(array $data): string
    {
        $result = "";
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                $result .= $key . ' - ' . $value . "\n";
            }
            $result .= "_______\n";
        }
        return $result;
    }
}

<?php

namespace App\Strategies;

class ConcreteStrategy2 extends AbstractStrategy
{
    public function formatData(array $data): string
    {
        $result = "";
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                $keyFormatted = strtolower(preg_replace('/(?<!^)[A-Z]/', ' $0', $key));
                $result .= '|' . $keyFormatted . '|' . $value . "|\n";
            }
            $result .= "_______\n";
        }
        return $result;
    }
}

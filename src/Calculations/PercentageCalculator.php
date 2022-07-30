<?php

namespace Src\Calculations;

use Src\Calculations\Interfaces\PercentageCalculatorInterface;

class PercentageCalculator implements PercentageCalculatorInterface
{
    /**
     * Calculate the ratio of a part to a whole as a percentage
     *
     * @param float $share
     * @param float $whole
     * @return float
     */
    public function percentOf(float $share, float $whole): float
    {
        return $share / $whole * 100;
    }
}
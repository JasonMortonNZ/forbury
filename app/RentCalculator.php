<?php
namespace App;

class RentCalculator
{
    const RENT_TIER_1_PERCENTAGE = 0.08;
    const RENT_TIER_2_PERCENTAGE = 0.04;
    const RENT_TIER_3_PERCENTAGE = 0.02;
    const SALES_GROWTH = 2.5;

    public function calculateRent($baseRent, $annualSales)
    {
        $rentForTierOne = $this->calculateTierOne($baseRent);
        $rentForTierTwo = $this->calculateTierTwo($baseRent);
        $rentForTierThree = $this->calculateTierThree($baseRent, $annualSales);

        $sumOfTiers = $rentForTierOne + $rentForTierTwo + $rentForTierThree;

        return [
            'tier 1' => $rentForTierOne,
            'tier 2' => $rentForTierTwo,
            'tier 3' => $rentForTierThree,
            'total' => number_format($sumOfTiers, 2, '.', '')
        ];
    }

    protected function calculateTierOne($baseRent)
    {
        $start = $baseRent / self::RENT_TIER_1_PERCENTAGE;
        $finish = $baseRent / self::RENT_TIER_2_PERCENTAGE;

        $sales = abs($start-$finish);

        return number_format($sales * self::RENT_TIER_1_PERCENTAGE, 2, '.', '');
    }

    protected function calculateTierTwo($baseRent)
    {
        $start = $baseRent / self::RENT_TIER_2_PERCENTAGE;
        $finish = $baseRent / self::RENT_TIER_3_PERCENTAGE;

        $sales = abs($start-$finish);

        return number_format($sales * self::RENT_TIER_2_PERCENTAGE, 2, '.', '');
    }

    protected function calculateTierThree($baseRent, $annualSales)
    {
        $start = $baseRent / self::RENT_TIER_3_PERCENTAGE;

        $sales = abs($start-$annualSales);

        return number_format($sales * (self::RENT_TIER_3_PERCENTAGE / 100), 2, '.', '');
    }
}
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

        return number_format($sumOfTiers, 2, '.', '');
    }

    protected function calculateTierOne($baseRent)
    {
        $start = $baseRent / self::RENT_TIER_1_PERCENTAGE;
        $finish = $baseRent / self::RENT_TIER_2_PERCENTAGE;

        $sales = abs($start-$finish);

        return $sales * self::RENT_TIER_1_PERCENTAGE;
    }

    protected function calculateTierTwo($baseRent)
    {
        $start = $baseRent / self::RENT_TIER_2_PERCENTAGE;
        $finish = $baseRent / self::RENT_TIER_3_PERCENTAGE;

        $sales = abs($start-$finish);

        return $sales * self::RENT_TIER_2_PERCENTAGE;
    }

    protected function calculateTierThree($baseRent, $annualSales)
    {
        $start = $baseRent / self::RENT_TIER_3_PERCENTAGE;

        $tierOneIncome = abs($start-$annualSales);

        return $tierOneIncome * (self::RENT_TIER_3_PERCENTAGE / 100);
    }
}
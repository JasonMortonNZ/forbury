<?php

namespace App\Http\Controllers;

use App\RentCalculator;
use Illuminate\Http\Request;

class ForburyController extends Controller
{
    /**
     * @var RentCalculator
     */
    protected $calculator;

    /**
     * ForburyController constructor.
     *
     * @param RentCalculator $calculator
     */
    public function __construct(RentCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * Display the home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Calculate rent
     *
     * @param Request $request
     *
     * @return array
     */
    public function calculate(Request $request)
    {
        $rent = $request->get('baseRent');
        $rentAfterFiveYears = $request->get('rentAfterFiveYears');
        $annualSales = $request->get('annualSales');

        $results = [];

        for ($i = 1; $i <= 10; $i++) {
            // Save percentage rent amount
            $results[$i]['rents'] = $this->calculator->calculateRent($rent, $annualSales);
            $results[$i]['sales'] = number_format($annualSales, 2);

            // Increase sales by 2.5% per year
            $annualSales = $annualSales * 1.025;

            // Update rent after 5 years
            if ($i == 5) $rent = $rentAfterFiveYears;
        }

        return $results;
    }
}

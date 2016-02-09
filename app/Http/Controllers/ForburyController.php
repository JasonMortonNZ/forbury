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
     */
    public function calculate(Request $request)
    {

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Calculator;
class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $num1 = $request->input('num_1');
        $num2 = $request->input('num_2');
        $operation = $request->input('operation');

        try {
            $calculator = new Calculator($num1);
            $calculator->calculate($operation, $num2);
            $result = $calculator->getResult();
        } catch (\InvalidArgumentException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('calculator', compact('result'))->withInput($request->except('operation'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('Calculador');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'bill_amount' => 'required|numeric|min:0',
            'tip_percentage' => 'required|numeric|min:0|max:100',
        ]);

        $billAmount = $validated['bill_amount'];
        $tipPercentage = $validated['tip_percentage'];
        $tipAmount = ($billAmount * $tipPercentage) / 100;
        $totalAmount = $billAmount + $tipAmount;

        return view('Calculador', compact('billAmount', 'tipPercentage', 'tipAmount', 'totalAmount'));
    }
}

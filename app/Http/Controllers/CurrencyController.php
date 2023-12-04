<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CurrencyService;

class CurrencyController extends Controller
{
    public function __construct(CurrencyService $currencyService){
        $this->currency_service = $currencyService;
    }

    /*
        Get currencies
    */

    public function index(Request $request){
        $currencies = $this->currency_service->index($request->query());
        return response()->json([
            'status' => true,
            'currencies' => $currencies
        ],200);
    }
}

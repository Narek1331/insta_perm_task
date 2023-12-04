<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CurrencyService;

class CurrencyController extends Controller
{
    public function __construct(CurrencyService $currencyService){
        $this->currency_service = $currencyService;
    }

    public function index(){
        dd($this->currency_service->index());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CurrencyService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * Make CurrencyService instance.
     *
     * @return void
     */
    public function __construct(CurrencyService $currencyService)
    {
        $this->currency_service = $currencyService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $currencies = $this->currency_service->index($request->query());
        return view('home',compact('currencies'));
    }
}

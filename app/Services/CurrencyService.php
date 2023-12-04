<?php
namespace App\Services;

use App\Models\Currency;


class CurrencyService{

    /*
        Get currencies
    */
    public function index(array $params = []){
        $currencies = Currency::query();

        if(isset($params['valuteID'])){
            $currencies = $currencies->where('valuteID',$params['valuteID']);
        }

        if(isset($params['date_from']) && isset($params['date_to'])){
            $currencies = $currencies->whereDate('date','>=',$params['date_from'])
            ->whereDate('date','<=',$params['date_to']);
        }

        return $currencies->get();
    }
}
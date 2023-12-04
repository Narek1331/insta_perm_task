<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Currency;
use Carbon\Carbon;

class GetCurrency extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $dates = []; 

        for($i=1; $i < intval($now->format('d')) + 1; ++$i) {
            $dates[] = Carbon::createFromDate($now->year, $now->month, $i)->format('d/m/Y');
        }

        foreach($dates as $date){
        
        $response = Http::get('https://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $date);
        $xml = simplexml_load_string($response->body(), "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        
        
        foreach($array['Valute'] as $data){
            Currency::create([
                'valuteID' => $data['@attributes']['ID'],
                'numCode' => $data['NumCode'],
                'сharCode' => $data['CharCode'],
                'name' => $data['Name'],
                'value' => $data['Value'],
                'date' => date('y-m-d'),
            ]);
        }

        }
    }
}

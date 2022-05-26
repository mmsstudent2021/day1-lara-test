<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExchangeController extends Controller
{
    public function exchange(Request $request){

//        return $request;

        $rates = Http::get("http://forex.cbm.gov.mm/api/latest")->object()->rates;
        $fromCurrencyRate = str_replace(",","",$rates->{strtoupper($request->fromCurrency)});
        $toCurrencyRate = str_replace(",","",$rates->{strtoupper($request->toCurrency)});

        //FromCurrency to mmk
        $mmk = $request->amount * $fromCurrencyRate;

        //mmk to ToCurrency
        $result = round($mmk / $toCurrencyRate,2)." ".$request->toCurrency;

//        $input = $request->amount." ".$request->fromCurrency;

        $record = new Record();
        $record->input = $request->amount." ".$request->fromCurrency;
        $record->output = $result;
        $record->save();

//        return $record->all();
//        return $record->first();
//        return $record->find(4);
//        return $record->findOrFail(100);



        return view('exchange-result',[
            'result' => $result,
            'inputAmount' => $request->amount,
            "inputCurrency" => $request->fromCurrency,
            "records" => $record->all()
        ]);
    }
}

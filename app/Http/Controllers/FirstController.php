<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Symfony\Component\VarDumper\Dumper\esc;

class FirstController extends Controller
{
    public function run(){
        return "this is run";
    }

    public function exchangeToMMK(Request $request){
        $newName = uniqid()."_".$request->file('photo')->getClientOriginalName();
        $fileName = $request->photo->storeAs("upload-test",$newName);
        return $fileName;
//        dd($request);
//        return $request->currency;
//        if($request->has('amount')){
//            return $request->amount;
//        }else{
//            return "amount ma shi buu";
//        }
        $rates = Http::get("http://forex.cbm.gov.mm/api/latest")->object()->rates;
        $rateToFloat = str_replace(",","",$rates->{strtoupper($request->currency)});
        return $request->amount * $rateToFloat . "mmk";
    }
}

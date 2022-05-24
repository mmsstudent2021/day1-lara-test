<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\FirstController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome',["name"=>"hhz","age"=>28]);
})->name("home");

Route::get("user/{name?}",function ($name=null){
    return "I'm User ".$name;
})->name("user");

Route::get("calc/{firstInt}/{secondInt}",function ($firstInt,$secondInt){
    return view('add',compact('firstInt','secondInt'));
})->name('add');






Route::get("/about-me",function (){
    return view('about',["text"=>"I'm just testing"]);
})->name('about');

Route::view("contact-us","contact",["text"=>"I'm just testing"])->name('contact');

//Route::get("/contact",function (){
//    return view('contact');
//});


//Route::get("/add/{x}/{y}",function ($x,$y){
//    return $x+$y;
//});

Route::get("/add/{x}/{y}",fn($x,$y)=>$x+$y);


Route::get("/products",function (){

    $products = Http::get('https://fakestoreapi.com/products')->object();
//    dd($products);
    return $products;
});

Route::get("/products/price-max/{amount}",function ($amount){
    $products = Http::get('https://fakestoreapi.com/products')->json();
//    $products = array_filter($products,fn($p)=>$p['price'] < $amount);
    $products = collect($products)->where("price","<",$amount);
//    $products = collect($products)->whereBetween("price",[20,70]);
    return $products;
});

Route::get("/products/price-min/{amount}",function ($amount){
    $products = Http::get('https://fakestoreapi.com/products')->json();
//    $products = array_filter($products,fn($p)=>$p['price'] < $amount);
    $products = collect($products)->where("price",">",$amount);
//    $products = collect($products)->whereBetween("price",[20,70]);
    return $products;
});

Route::get(
    "/products/price-between/{min}/and/{max}",
    fn($min,$max)=>Http::get('https://fakestoreapi.com/products')
        ->collect()
        ->whereBetween('price',[$min,$max])
);

Route::get("/exchange-from/{amount}/{fromCurrency}/to/mmk",function ($amount,$fromCurrency){
   $rates = Http::get("http://forex.cbm.gov.mm/api/latest")->object()->rates;
   $rateToFloat = str_replace(",","",$rates->{strtoupper($fromCurrency)});
   return $amount * $rateToFloat . "mmk";
});

Route::get("/exchange-to/{toCurrency}/from/{amount}/mmk",function ($toCurrency,$amount){
    $rates = Http::get("http://forex.cbm.gov.mm/api/latest")->object()->rates;
    $rateToFloat = str_replace(",","",$rates->{strtoupper($toCurrency)});
    return round($amount / $rateToFloat,2).$toCurrency;
});

Route::post("/exchange-to-mmk",[FirstController::class,'exchangeToMMK'])->name('exchange-to-mmk');

Route::get("/run",[FirstController::class,'run']);






















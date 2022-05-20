<?php

use Illuminate\Support\Facades\Route;

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

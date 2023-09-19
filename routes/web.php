<?php

use Faker\Core\Number;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/user/{id}', function ($id) {
    return view('user', ['id' => $id]);
});

Route::get('/post/{slug}', function ($slug) {
    return view('blog');
});

Route::get('/category/{category}', function ($category) {
    return view('blog.category');
});

Route::get('/user/{id}/language/{lang?}', function ($id, $lang = null) {
    return view('language',['id' => $id], ['lang' => $lang]);
});

Route::get('/products/{category}/{minPrice?}', function ($category, $minPrice = null) {
    return view('price',['category' => $category], ['minPrice' => $minPrice]);
});

Route::get('/page/{page}', function ($page) {
    if(ctype_digit($page)) {
        return view('page', ['page' => $page]);
    } else {
        abort(404);
    }
})->where('page','[0-9]+')->name('page.number');

Route::get('/convert/{currency}', function ($currency) {
    if(preg_match('/^\d+(\.\d{1,2})?$/', $currency)) {

        $valorDolar = 0.21;
        //$x =  (float)$currency;
        //$valorTotal = $valorDolar * $x;
        $valorTotal = ($valorDolar * (float)$currency);
        echo 'resultado: '. ($valorTotal);
        //return view('converter', ['currency' => $currency]);
    } else {
        abort(404);
    }
})->where('currency', '^\d+(\.\d{1,2})?$')->name('currency.convert');

Route::get('/sum/{number1}/{number2}', function ($number1, $number2) {
    if(ctype_digit($number1) && ctype_digit($number2)) {

        echo 'resultado: '. $number1 + $number2;
        //return view('sum',['number1' => $number1], ['number2' => $number2]);
    } else {
        abort(404);
    }
});

Route::get('/mensagem/{message}', function ($message) {
    echo $message;
    //return view('blog.category');
});
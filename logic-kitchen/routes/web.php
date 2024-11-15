<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contacts', function () {
    $data = [
        'name' => 'Контакты студии Logic Kitchen',
        'city' => 'Екатеринбург',
        'email' => 'logic-kitchen@yandex.ru',
        'phone' => '+7-932-604-35-56',
        'vk' => 'https://vk.com/logickitchen',
        'telegram' => 'https://t.me/logic_kitchen',
        'whatsapp' => 'https://wa.me/79126071619'
    ];
    return view('contacts', $data);
});

Route::post('/submit-form', [FormController::class, 'postForm'])->name('post_form');
Route::get('/soglasie', function () {
    return view('soglasie', ['name' => 'Политика обработки персональных данных']);
});
Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');

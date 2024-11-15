<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Mail\FormSubmission;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function postForm(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:50|min:1',
            'phone' => 'required|regex:/^\+7\(\d{3}\) \d{3}-\d{2}-\d{2}$/',
            'gift' => 'nullable|string|max:20|min:1',
            'form_type' => 'required|string'
        ]);

        // Логика обработки в зависимости от формы
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
        ];

        if ($request->input('form_type') === 'giftform') {
            $data['gift'] = $request->input('gift');
        }

        // Отправка почты
        Mail::to('logic-kitchen@yandex.ru')->send(new FormSubmission($data));
        return redirect()->route('thankyou');
    }
}

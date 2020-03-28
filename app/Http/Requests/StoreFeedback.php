<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedback extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email"=>'required|email',
            "phone"=>'required|regex:/[+][7] [0-9]{3} [0-9]{3}[-][0-9]{2}[-][0-9]{2}/i',
            
            //
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>"Поле email не может быть пустым",
            'email.email'=>"Поле email не соответствует формату адреса электронной почты",
            'phone.required'=>"Поле Телефон не может быть пустым",
            'phone.regex'=>"Поле телефон не соответсвует формату номера телефона. Формат ввода номера телефона +7 888 888-88-88"
        ];

    }
}

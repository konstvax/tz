<?php

namespace App\Http\Requests\Guestbook;

use Illuminate\Foundation\Http\FormRequest;

class GuestbookCreateRequest extends FormRequest
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
            'username' => 'required|min:5|max:20|regex:/^[a-zA-Z0-9]+$/',
            'email' => 'required|email',
            'text' => 'required|string|min:10|max:1000|regex:/^([^<>])+$/',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'username.regex' => 'The username only consist of symbols of the Latin alphabet and numbers',
            'text.regex' => 'The text should not contain HTML entities',
        ];

    }


}

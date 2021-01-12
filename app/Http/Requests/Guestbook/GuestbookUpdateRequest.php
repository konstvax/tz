<?php

namespace App\Http\Requests\Guestbook;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GuestbookUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required|string|min:10|max:1000|regex:/^([^<>])+$/',
        ];
    }

    public function messages()
    {
        return [
            'text.regex' => 'The text should not contain HTML entities',
        ];
    }
}

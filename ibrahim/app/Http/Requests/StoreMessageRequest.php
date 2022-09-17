<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|min:8|max:255",
            "email" => "email|required",
            "message" => "required|min:150",
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required' => "Name can't be empty.",
            'email.required' => "Email can't be empty.",
            'email.email' => "Please enter valid email address.",
            'message.required' => "Message can't be empty.",
            'message.min' => "Message can't be less then 150 characters.",
        ];
    }
}

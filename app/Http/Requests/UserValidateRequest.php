<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateRequest extends FormRequest
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
   static public function rules()
    {


        return [
            'register'=>[
                'name'=>'required|string',
                'email'=>'required|string|unique:users,email',
                'password'=>'required|string|confirmed',

            ],
            'login'=>[
                'email' => 'required|string',
                'password' => 'required|string'
            ]
        ];
    }
}

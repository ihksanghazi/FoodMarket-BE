<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $validation = [
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'address' => ['required','string'],
            'roles' => ['required','string','max:255','in:USER,ADMIN'],
            'houseNumber' => ['required','string','max:255'],
            'phoneNumber' => ['required','string','max:255'],
            'city' => ['required','string','max:255'],
        ];

        if($validation['email']){
            $validation['email'] = ['nullable'];
        }

        return $validation;
    }
}

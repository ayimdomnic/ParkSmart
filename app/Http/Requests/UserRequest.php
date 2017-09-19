<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if ($this->getMethod() == 'PATCH') {
            $id = $this->user->getAttribute('id');
            $required = '';
        } else {
            $id = null;
            $required = 'required|';
        }

        return [
            'firt_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string|unique:users,phone,id,deleted_at',
            'email' => 'required|email|unique:users,email,' . $id . ',id,deleted_at,NULL',
            'password' => $required . 'confirmed',
            'roles' => 'required',
            'avatar' => 'mimes:jpeg,png,jpg',
        ];
    
    }
}

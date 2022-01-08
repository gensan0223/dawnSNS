<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            //
            'username' => 'min:4|max:12',
            'mail'=>'min:4|max:12|unique:users,mail',
            'newPassword'=>'min:4|max:12|unique:users,password|different:password',
            'bio'=>'max:200',
            'icon'=>'mimes:jpg,png,bmp,gif,svg',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\IconRule;
use App\Rules\ProfilePasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    // public function __construct(
    //     IconRule $icon_rule
    // ) {
    //     $this->$icon_rule = $icon_rule;
    // }
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
            'mail'=>[
                'required',
                Rule::unique('users')->ignore(Auth::id()),
                'min:4',
            ],
            'newPassword'=>[
                'nullable',
                'min:4',
                'max:12',
                'unique:users,password',
                new ProfilePasswordRule
            ],
            'bio'=>'nullable|max:200',
            'icon'=>[
                'mimes:jpg,png,bmp,gif,svg',
                new IconRule
            ]
        ];
    }
}

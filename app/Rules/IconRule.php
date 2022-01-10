<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IconRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if (!preg_match('/^[-_a-zA-Z0-9]/', $value->getClientOriginalName())) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'ファイル名を半角英数字に変更してください。';
    }
}

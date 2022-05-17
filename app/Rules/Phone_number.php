<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone_number implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // 電話番号はハイフンなしの11桁の整数値にルール設定
        return preg_match('/^\d{11}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.phone_number_validation');
    }
}

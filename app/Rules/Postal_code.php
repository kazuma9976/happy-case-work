<?php

namespace App\Rules;
namespace App\User; // 追加
use App\Patient; // 追加 

use Illuminate\Contracts\Validation\Rule;

class Postal_code implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    
    public function store(Request $request){

        $input = $request->all();

        Validator::make($input, [
            'postal_code' => ['required',new Postal_code],
        ])->validate();
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
        return preg_match('/^\d{3}[-]\d{4}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '郵便番号の書式に誤りがあります';
    }
}

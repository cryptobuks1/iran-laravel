<?php

namespace Dena\IranLaravel\Rules;

use Illuminate\Contracts\Validation\Rule;

use Dena\IranLaravel\Helpers\PhoneNumber;

class IranPhoneNumber implements Rule
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
        return (PhoneNumber::IranMobileValidation($value)) ? true : false ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('iran_laravel.iran_phone_number');
    }
}
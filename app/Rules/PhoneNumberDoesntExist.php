<?php

namespace App\Rules;

use App\Models\Applicant;
use Illuminate\Contracts\Validation\Rule;

class PhoneNumberDoesntExist implements Rule
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
        return count(Applicant::where("phone_number", $value)->get()) == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The phone number is already used.';
    }
}

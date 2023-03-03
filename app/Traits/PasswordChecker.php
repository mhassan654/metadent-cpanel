<?php

namespace App\Traits;

use Illuminate\Validation\Rules\Password;

trait PasswordChecker
{

    /**
     * Returns password vaildation checks basing on system settings
     *
     * @return Password
     */
    public function password_validate()
    {
        $allow_numbers = get_facility_setting('allow_password_numbers');
        $allow_symbols = get_facility_setting('allow_password_symbols');
        $allow_allCases = get_facility_setting('allow_password_allcases');
        $pasword_min_length = get_facility_setting('password_min_length');

        $numbers_and_allcases = ($allow_numbers == "1") && ($allow_allCases == "1");
        $symbols_and_allcases = ($allow_symbols == "1") && ($allow_allCases == "1");
        $symbols_and_numbers = ($allow_symbols == "1") && ($allow_numbers == "1");


        if (($allow_numbers == '1') && ($allow_symbols == '1') && ($allow_allCases == '1')) // allow password strength to contain numbers, symbols, and all cases
        {
            // echo 'numbrs '. $allow_numbers .'<br>'. 'symbols '.$allow_symbols .'<br>'. 'mixed '.$allow_allCases;
            return Password::min($pasword_min_length)
                ->numbers()
                ->mixedCase()
                ->symbols()
                ->uncompromised();
        }


        if ($numbers_and_allcases ) // allow password strength to conatin only numbers and mixed cases
        {
            // echo 'numbrs '. $allow_numbers .'<br>'. 'mixed '.$allow_allCases;
            return Password::min($pasword_min_length)
                ->numbers()
                ->mixedCase()
                ->uncompromised();
        }

        if ( $symbols_and_allcases) // allow password strength to contain only mixed cases and symbols
        {
            // echo  'symbols '.$allow_symbols ,  'mixed '.$allow_allCases;
            return Password::min($pasword_min_length)
                ->mixedCase()
                ->symbols()
                ->uncompromised();
        }

        if ($symbols_and_numbers) // allow password strength to contain all numbers, symbols
        {
        //    echo 'numbrs '. $allow_numbers .'<br>'.  'symbols '.$allow_symbols;
           return Password::min($pasword_min_length)
               ->numbers()
               ->symbols()
               ->uncompromised();
       }
        else{
            return Password::min(12)->default();
        }

    }

}

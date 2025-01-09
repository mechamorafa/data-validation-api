<?php

class CNPJValidator
{
    public static function validate($cnpj)
    {
        // Parse the CNPJ number
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        // Check if it has 14 digits
        if (strlen($cnpj) !== 14) {
            return false;
        }

        // Check if all digits are equal (ex.: 11.111.111/1111-11) 
        if (preg_match('/^(\d)\1*$/', $cnpj)) {
            return false;
        }

        // Calculate the first and second check digits. 
        $firstCheck = self::calculateDigit(substr($cnpj, 0, 12));
        $secondCheck = self::calculateDigit(substr($cnpj, 0, 12) . $firstCheck);

        // Check if the calculated digits matches with the provided ones.
        return $cnpj[12] == $firstCheck && $cnpj[13] == $secondCheck;
    }

    private static function calculateDigit($base)
    {
        $weights = strlen($base) === 12 ? [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2] : [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $sum = 0;

        foreach (str_split($base) as $i => $digit) {
            $sum += $digit * $weights[$i];
        }

        $remainder = $sum % 11;
        return $remainder < 2 ? 0 : 11 - $remainder;
    }
}

?>
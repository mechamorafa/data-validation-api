<?php

class CPFValidator
{
    public static function validate($cpf)
    {
        // Parse the CPF number
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Check if it has 11 digits
        if (strlen($cpf) !== 11) {
            return false;
        }

        // Check if all digits are equal (ex.: 111.111.111-11)
        if (preg_match('/^(\d)\1*$/', $cpf)) {
            return false;
        }

        // Calculate the first check digit
        $firstCheck = self::calculateDigit(substr($cpf, 0, 9));
        // Calculate the second check digit
        $secondCheck = self::calculateDigit(substr($cpf, 0, 9) . $firstCheck);

        // Check if the calculated digits matches with the provided ones. 
        return $cpf[9] == $firstCheck && $cpf[10] == $secondCheck;
    }

    private static function calculateDigit($base)
    {
        $sum = 0;
        $factor = strlen($base) + 1;

        // Multiply each digit by its corresponding factor. 
        for ($i = 0; $i < strlen($base); $i++) {
            $sum += $base[$i] * $factor--;
        }

        // Calculate the rest of the division by 11. 
        $remainder = $sum % 11;

        // Return 0 if the remainder is less than 2, otherwise return 11 minus the remainder. 
        return $remainder < 2 ? 0 : 11 - $remainder;
    }
}

?>
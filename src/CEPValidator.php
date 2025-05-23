<?php

/* testing the code review */ 

class CEPValidator
{
    public static function validate($cep)
    {
        // Parse the CEP
        $cep = preg_replace('/[^0-9]/', '', $cep);

        // Chek if it has 8 digits
        return strlen($cep) === 8;
    }

}


?>
<?php

require_once 'EmailValidator.php';
require_once 'CPFValidator.php';
require_once 'CNPJValidator.php';
require_once 'CEPValidator.php';

class Validator
{
    public function validate($type, $value)
    {
        switch ($type) {
            case 'email':
                return EmailValidator::validate($value);
            case 'cpf':
                return CPFValidator::validate($value);
            case 'cnpj':
                return CNPJValidator::validate($value);
            case 'cep':
                return CEPValidator::validate($value);
            default:
                throw new Exception("Validation type not supported");
        }
    }
}

?>
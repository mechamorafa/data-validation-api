<?php

require_once '../src/CNPJValidator.php';
require_once '../src/CPFValidator.php';
require_once '../src/CEPValidator.php';
require_once '../src/EmailValidator.php';

echo json_encode([
    'cnpj' => CNPJValidator::validate("12.345.678/0001-95"),
    'cpf' => CNPJValidator::validate("034.450.450-09"),
    'cep' => CEPValidator::validate("01001000"),
    'email' => EmailValidator::validate("teste@exemplo.com")
]);
?>
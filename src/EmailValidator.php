<?php

class EmailValidator
{
    public static function validate($email)
    {
        // Validate the e-mail format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Optional: Check if the e-mail is a valid MX record
        $domain = substr(strrchr($email, "@"), 1);
        return checkdnsrr($domain, "MX");
    }
}

?>
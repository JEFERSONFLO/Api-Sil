<?php
use Illuminate\Contracts\Validation\Rule;

class BinaryDataRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Verificar si el valor es un dato binario
        return is_string($value) && ctype_print($value);
    }

    public function message()
    {
        return 'El campo :attribute debe ser un dato binario válido.';
    }
}


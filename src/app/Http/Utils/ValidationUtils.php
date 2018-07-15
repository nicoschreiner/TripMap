<?php

namespace App\Http\Utils;

use Illuminate\Support\ViewErrorBag;

class ValidationUtils
{

    public static function getInvalidClass(ViewErrorBag $errors, string $field): string {
        $class = '';

        if (!empty($field) && $errors->any()) {
            if ($errors->has($field)) {
                $class = 'is-invalid';
            } else {
                $class = 'is-valid';
            }
        }

        return $class;
    }

}

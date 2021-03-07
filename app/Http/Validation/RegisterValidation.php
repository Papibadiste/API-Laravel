<?php

namespace App\Http\Validation;

class RegisterValidation {
    public function rules() {
        return [
            'name' => ['required', 'string', 'max:150', 'min:3'],
            'email' => ['required', 'string', 'email' , 'max:150', 'min:3', 'unique:users'],
            'password' => ['required', 'string'],
            'confirmPassword' => ['required', 'same:password'],
        ];
    }

    public function msg() {
        return [
            'confirmPassword.same' => 'Les mots de passes ne sont pas identique',
            'email.unique' => 'L\'email est deja utilisé',
        ];
    }
}

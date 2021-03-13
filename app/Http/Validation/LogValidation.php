<?php


namespace App\Http\Validation;


class LogValidation
{
    public function rules() {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ];
    }

    public function msg() {
        return [
            'password.required' => 'Entrez votre mot de passe',
            'email.required' => 'Entrez votre mail',
            'email.email' => 'L\'email n\'est pas valide',
        ];
    }
}

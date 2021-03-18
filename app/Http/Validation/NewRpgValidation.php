<?php


namespace App\Http\Validation;


class NewRpgValidation
{
    public function rules() {
        return [
            'note' => ['required','numeric','min:0','max:100'],
            'src_img' => ['required'],
            'title' => ['required', 'string','min:2', 'max:15'],
            'description' => ['required', 'string', 'min:330', 'min:300']
        ];
    }

    public function msg() {
        return [
            'title.required' => 'Le nom du jeu est obligatoire',
            'title.min' => 'Le nom du jeu doit avoir 2 caractère minimum',
            'title.max' => 'Le nom du jeu doit avoir 15 caractère minimum',
            'description.required' => 'Une description est obligatoire',
            'description.min' => 'La description doit avoir 300 caractère minimum',
            'description.max' => 'La description doit avoir 330 caractère maximun',
            'src_img.required' => 'Une images est obligatoire',
            'note.numeric' => 'Merci de rentrer un nombre',
            'note.max' => 'La note max est 100',
            'note.min' => 'La note min est 0',
            'note.required' => 'Une note est obligatoire',
        ];
    }
}

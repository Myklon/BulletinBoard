<?php

return [
    'register' => [
        'login.required' => 'Введите логин.',
        'email.required' => 'Введите электронную почту.',
        'email.email' => 'Поле :attribute должно быть электронной почтой.',
        'phone.required' => 'Введите номер телефона.',
        'password.required' => 'Введите пароль.',
        'password.confirmed' => 'Пароли должны совпадать',
        'login.unique' => 'Такой логин уже существует.',
        'email.unique' => 'Такая почта уже существует.',
        'phone.unique' => 'Такой номер телефона уже существует.',
        'min' => 'Поле :attribute должно содержать не менее :min символов.',
        'max' => 'Поле :attribute должно содержать не более :max символов.',
        'phone.regex' => 'Номер телефона должен быть валидным',
        ]
];

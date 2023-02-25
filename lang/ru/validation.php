<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'min' => [
        'file' => ':attribute должно быть не меньше :min килобайт.',
        'numeric' => 'Поле :attribute должно быть не меньше :min.',
        'string' => 'Поле :attribute должно содержать не менее :min символов.',
    ],
    'max' => [
        'file' => ':attribute должно быть не более :min килобайт.',
        'numeric' => 'Поле :attribute должно быть не более :min.',
        'string' => 'Поле :attribute должно содержать не более :min символов.',
    ],
    'string' => 'Поле :attribute должно быть строкой.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'image' => 'Поле :attribute должно быть изображением.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        # Форма товара
        'title' => [
            'required' => 'Введите название товара.',
        ],
        'short_description' => [
            'required' => 'Введите краткое описание.',
        ],
        'description.required' => 'Введите описание товара.',
        'price.required' => 'Введите цену товара.',
        'category.required' => 'Выберите категорию.',
        'category_id.exists' => 'Такой категории не существует.',
        'price.min' => 'Цена не может быть меньше 0',
        'cover.max' => 'Размер обложки не должен превышать :max килобайт.',
        'files.max' => 'Изображений должно быть не больше :max',
        'files.*.image' => 'Изображения должны быть изображениями',
        'files.*.max' => 'Изображения не должны превышать :max килобайт',

        # Форма регистрации/входа
        'login.required' => 'Введите логин.',
        'email.required' => 'Введите электронную почту.',
        'email.email' => 'Поле :attribute должно быть электронной почтой.',
        'phone.required' => 'Введите номер телефона.',
        'password.required' => 'Введите пароль.',
        'password.confirmed' => 'Пароли должны совпадать',
        'login.unique' => 'Такой логин уже существует.',
        'email.unique' => 'Такая почта уже существует.',
        'phone.unique' => 'Такой номер телефона уже существует.',
        'phone.regex' => 'Номер телефона должен быть валидным',

        # Смена пароля
        'old_password.required' => 'Введите старый пароль.',
        'new_password.required' => 'Введите новый пароль.',
        'new_password.confirmed' => 'Пароли должны совпадать',

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        # Товар
        'title' => '`Название товара`',
        'short_description' => '`Краткое описание`',
        'description' => '`Описание товара`',
        'price' => '`Цена`',
        'category_id' => '`Категория`',
        'cover' => '`Обложка товара`',
        'files' => '`Изображения товара`',

        # Пользователь
        'login' => '`Имя пользователя`',
        'email' => '`Email`',
        'phone' => '`Номер телефона`',
        'password' => '`Пароль`',

        # Смена пароля
        'old_password' => '`Текущий пароль`',
        'new_password' => '`Новый пароль`',
        'new_password_confirmation' => '`Подтвердите новый пароль`',
    ],


];

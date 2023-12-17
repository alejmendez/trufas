<?php

return [
    'label' => 'User',
    'plural_label' => 'Users',
    'navigation_label' => 'Users',
    'sections' => [
        'principal' => 'Profile Details',
        'login' => 'Login',
        'roles' => 'Permissions'
    ],
    'table' => [
        'dni' => 'ID/ Passport',
        'name' => 'Name',
        'last_name' => 'Last Name',
        'email' => 'Email',
        'phone' => 'Phone',
        'email_verified_at' => 'Email Verified At',
        'password' => 'Password',
        'roles' => 'User Type',
        'avatar' => 'Select an Image',
    ],
    'form' => [
        'dni' => [
            'label' => 'ID/ Passport',
            'placeholder' => 'Enter your identification number',
        ],
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Enter your name',
        ],
        'last_name' => [
            'label' => 'Last Name',
            'placeholder' => 'Enter your last name',
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'name@example.com',
        ],
        'phone' => [
            'label' => 'Phone',
            'placeholder' => '(+56) 9 1234 5678',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => '************',
        ],
        'roles' => [
            'label' => 'User Type',
            'placeholder' => 'Select',
        ],
        'avatar' => [
            'label' => 'Select an Image',
        ],
    ]
];

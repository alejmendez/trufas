<?php

return [
    'label' => 'Usuario',
    'plural_label' => 'Usuarios',
    'navigation_label' => 'Usuarios',
    'sections' => [
        'principal' => 'Detalles del perfil',
        'login' => 'Inicio de sesión',
        'roles' => 'Permisos'
    ],
    'table' => [
        'dni'=> 'RUT/ ID',
        'full_name' => 'Nombre',
        'email' => 'Correo',
        'phone' => 'Teléfono',
        'email_verified_at' => 'Correo verificado el',
        'password' => 'Contraseña',
        'roles' => 'Tipo de usuario',
        'avatar' => 'Seleccione un imagen',
    ],
    'form' => [
        'dni' => [
            'label' => 'rut/id',
            'placeholder' => 'Ingresa tu número de identificación',
        ],
        'name' => [
            'label' => 'Nombre',
            'placeholder' => 'Ingresa tu nombre',
        ],
        'last_name' => [
            'label' => 'Apellidos',
            'placeholder' => 'Ingresa tu apellido',
        ],
        'email' => [
            'label' => 'Correo electrónico',
            'placeholder' => 'name@example.com',
        ],
        'phone' => [
            'label' => 'Teléfono',
            'placeholder' => '(+56) 9 1234 5678',
        ],
        'password' => [
            'label' => 'Contraseña',
            'placeholder' => '************',
        ],
        'roles' => [
            'label' => 'Tipo de usuario',
            'placeholder' => 'Seleccione',
        ],
        'avatar' => [
            'label' => 'Seleccione una imagen',
        ],
    ]
];

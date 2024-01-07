<?php

return [
    'label' => 'Planta',
    'plural_label' => 'Plantas',
    'navigation_label' => 'Plantas',
    'sections' => [
        'principal' => 'Detalles de la planta',
        'blueprint' => 'Planos'
    ],
    'tabs' => [
        'card' => 'Ficha',
        'variables' => 'Variables',
        'history' => 'Historial',
        'harvest' => 'Cosecha',
        'statistics' => 'Estadísticas',
    ],
    'view' => [
        'name' => 'Planta: ',
        'field_id' => 'Perteneciente al campo',
        'quater_id' => 'Perteneciente al cuartel',
        'type' => 'Tipo de planta',
        'age' => 'Edad',
        'planned_at' => 'Fecha de plantación',
        'manager' => 'Responsable',
        'location' => 'Ubicación',
    ],
    'table' => [
        'name' => 'Nombre',
        'type' => 'Tipo de planta',
        'age' => 'Edad',
        'planned_at' => 'f plantacion',
        'location' => 'location',
        'location_xy' => 'location_xy',
        'manager' => 'manager',
    ],
    'form' => [
        'quarter_id' => [
            'label' => 'Cuartel asociado',
        ],
        'name'=> [
            'label' => 'Nombre de la  planta',
            'placeholder' => 'Nombre de la  planta',
        ],
        'type'=> [
            'label' => 'Tipo de planta',
            'placeholder' => 'Tipo de planta',
        ],
        'age' => [
            'label' => 'Edad de la  planta',
            'placeholder' => 'Edad de la  planta',
        ],
        'location' => [
            'label' => 'Ubicación - coordenada',
            'placeholder' => 'Ubicación - coordenada',
        ],
        'location_xy' => [
            'label' => 'Ubicación - eje x / eje y',
            'placeholder' => 'Ubicación - eje x / eje y',
        ],
        'planned_at' => [
            'label' => 'Fecha de plantación',
            'placeholder' => 'Fecha de plantación',
        ],
        'manager' => [
            'label' => 'Responsable de la  planta',
            'placeholder' => 'Responsable de la  planta',
        ],
        'blueprint'=> [
            'label' => 'Planos',
            'placeholder' => 'Planos',
        ],
    ]
];

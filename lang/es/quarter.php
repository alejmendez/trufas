<?php

return [
    'label' => 'Cuartel',
    'plural_label' => 'Cuarteles',
    'navigation_label' => 'Cuarteles',
    'sections' => [
        'principal' => 'Detalles del cuartel',
        'blueprint' => 'Planos'
    ],
    'tabs' => [
        'card' => 'Ficha',
        'documentation' => 'Documentación',
        'activity' => 'Actividad',
        'statistics' => 'Estadísticas',
    ],
    'view' => [
        'name' => 'Cuartel: ',
        'field_id' => 'Perteneciente al campo',
        'area' => 'Superficie del cuartel',
        'count_plants' => 'Cantidad de arboles',
        'planned_at' => 'Fecha de plantación',
        'blueprint' => '',
    ],
    'table' => [
        'name' => 'Nombres',
        'field_id' => 'Campo asociado',
        'area' => 'Sup. del cuartel',
        'count_plants' => 'Cant. de arboles',
        'planned_at' => 'F. de plantación',
    ],
    'form' => [
        'field_id' => [
            'label' => 'Campo asociado',
        ],
        'name'=> [
            'label' => 'Nombre del cuartel',
            'placeholder' => 'Nombre del cuartel',
        ],
        'area'=> [
            'label' => 'Superficie del cuartel',
            'placeholder' => 'Superficie del cuartel',
        ],
        'planned_at'=> [
            'label' => 'Fecha de plantación',
            'placeholder' => '20/10/2023',
        ],
        'blueprint'=> [
            'label' => 'Planos',
            'placeholder' => 'Planos',
        ],
        'count_plants'=> [
            'label' => 'Cantidad de arboles',
        ],
    ]
];

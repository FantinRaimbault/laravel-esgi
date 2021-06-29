<?php

return [
    'users' => [
        'roles' => [
            'basic' => 'sch94-basic',
            'admin' => 'sch94-admin',
        ]
    ],
    'contributors' => [
        'roles' => [
            'editor' => 'editor',
            'admin' => 'admin',
            'superAdmin' => 'superAdmin',
        ],
        'canEditContributor' => [
            'admin' => 'admin',
            'superAdmin' => 'superAdmin',
        ],
        'canPublishArticle' => [
            'admin' => 'admin',
            'superAdmin' => 'superAdmin',
        ]
    ],
    'categories' => [
        'type' => [
            'article' => [
                'music',
                'video games',
                'web development',
                'animals',
                'movie',
                'recipe',
                'sport',
            ]
        ]
    ]
];

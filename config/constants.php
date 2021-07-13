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
            'editor-in-chief' => 'editor-in-chief',
            'admin' => 'admin',
        ],
        'canEditContributor' => [
            'editor-in-chief' => 'editor-in-chief',
            'admin' => 'admin',
        ],
        'canPublishArticle' => [
            'editor-in-chief' => 'editor-in-chief',
            'admin' => 'admin',
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

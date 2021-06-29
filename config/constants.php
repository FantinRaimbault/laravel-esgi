<?php

return [
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
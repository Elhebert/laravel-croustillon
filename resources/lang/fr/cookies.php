<?php

return [
    'categories' => [
        'mandatory' => [
            'name' => 'indispensables',
            'description' => 'Ces cookies sont indispensables à la navigation ou à la fourniture d’un service. La suppression de ce type de cookies peut entraîner des difficultés de navigation et est fortement déconseillée.',
        ],

        'preferences' => [
            'name' => 'préférences',
            'description' => 'Ces cookies recueillent des informations sur vos choix et préférences et rendent votre navigation plus agréable et personnalisée. Ces cookies permettent notamment de mémoriser la langue choisie lors de votre première visite de notre Site aux fins de le personnaliser en conséquence.',
        ],

        'analytics' => [
            'name' => 'analytiques',
            'description' => 'Ces cookies sont utilisés pour rassembler des informations sur l’utilisation que vous faites du site afin d’améliorer le contenu de celui-ci, de le rendre plus adapté à vos besoins et d’augmenter sa facilité d’utilisation. Par exemple, ces cookies nous montrent les pages du site les plus visitées ou aident à identifier les difficultés qui peuvent être rencontrées au cours de la navigation.',
        ],

        'social' => [
            'name' => 'social',
            'description' => 'Ces cookies permettent de partager le contenu du Site avec d’autres personnes via les réseaux sociaux. Certains boutons de partage sont intégrés via des applications tierces pouvant émettre ce type de cookies. C’est notamment le cas des boutons [« Facebook », « Twitter », « Google + », « LinkedIn » et « Pinterest »]. Les réseaux sociaux fournissant un tel bouton de partage sont susceptibles de vous identifier grâce à ce bouton, même si vous n’avez pas utilisé ce bouton lors de la consultation de notre Site. Nous vous invitons à consulter la politique vie privée de ces réseaux sociaux afin de prendre connaissance des finalités d’utilisation des informations recueillies grâce à ces boutons de partage en vous rendant sur leurs sites respectifs.',
        ],

        'retargetting' => [
            'name' => 'ciblage publicitaire',
            'description' => 'Ces cookies sont utilisés à des fins de marketing notamment pour afficher de la publicité ciblée, réaliser des études de marché et évaluer l’efficacité d’une campagne publicitaire.',
        ],
    ],

    'purposes' => [
        'security' => 'Sécurité',
        'analytics' => 'Analyse du traffic',
        'retargetting' => 'Ciblage publicitaire',
        'cookie-preferences' => 'Préférences des cookies',
        'language-preferences' => 'Préférence de langue',
    ],

    'banner' => [
        'title' => 'Nous utilisons des cookies',
        'text' => [
            'Nous utilisons des cookies pour collecter des informations sur la manière dont les utilisateurs interagissent avec notre site Web.',
            'Nous utilisons ces informations pour créer des rapports et nous aider à améliorer le site web. Si vous n’autorisez pas ces cookies, nous ne pourrons pas inclure votre visite dans nos statistiques.',
        ],
        'submit' => 'J’accepte',
    ],

    'policy' => [
        'title' => 'Politiques des cookies',
        'labels' => [
            'cookie' => 'Type de cookies',
            'usage' => 'Finalité',
            'name' => 'Nom',
            'expiration' => 'Durée',
            'purpose' => 'Utilisation',
            'source' => 'Source',
            'consent-level' => 'Niveau de consentement',
        ],
    ],
];

<?php

return [
    'categories' => [
        'mandatory' => [
            'name' => 'mandatory',
            'description' => 'These cookies are essential for browsing or providing a service. The removal of this type of cookie may cause navigation difficulties and is strongly discouraged.',
        ],

        'preferences' => [
            'name' => 'preferences',
            'description' => 'These cookies collect information about your choices and preferences and make your navigation more pleasant and personalized. These cookies make it possible to memorize the language chosen during your first visit of our Site in order to personalize it accordingly.',
        ],

        'analytics' => [
            'name' => 'analytics',
            'description' => 'These cookies are used to gather information about your use of the site to improve the content of the site, to make it more suitable to your needs and to increase its usability. For example, these cookies show us the pages of the most visited website or help to identify the difficulties that may be encountered during the navigation.',
        ],

        'social' => [
            'name' => 'social',
            'description' => 'These cookies allow you to share the content of the Site with other people via social networks. Some sharing buttons are integrated via third-party applications that can issue this type of cookies. This is particularly the case with the buttons [« Facebook », « Twitter », « Google + », « LinkedIn » and « Pinterest »]. Social networks providing such a sharing button are likely to identify you with this button, even if you did not use this button when visiting our Site. We invite you to consult the privacy policy of these social networks to learn the purpose of using the information collected through these sharing buttons by going to their respective sites.',
        ],

        'retargetting' => [
            'name' => 'retargetting',
            'description' => 'These cookies are used for marketing purposes, in particular to display targeted advertising, conduct market research and evaluate the effectiveness of an advertising campaign.',
        ],
    ],

    'purposes' => [
        'security' => 'Security',
        'analytics' => 'Trafic analysis',
        'retargetting' => 'Retargetting',
        'cookie-preferences' => 'Cookies preferences',
        'language-preferences' => 'Language preferences',
    ],

    'banner' => [
        'title' => 'We use cookies',
        'text' => [
            'We use cookies to gather information about the way users interact with our website.',
            'We use this information to create reports and help us improve the website. If you do not allow theses cookies we will not be able to include your visit in our statistics.',
        ],
        'submit' => 'I accept',
    ],

    'policy' => [
        'title' => 'Cookies policy',
        'labels' => [
            'cookie' => 'Cookie type',
            'usage' => 'usage',
            'name' => 'Name',
            'expiration' => 'Expiration',
            'purpose' => 'Purpose',
            'source' => 'Source',
            'consent-level' => 'Level of consent',
        ],
    ],
];

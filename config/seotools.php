<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Udomi.net - Najbolji besplatni oglasnik za životinje", // set false to total remove
            'description'  => 'Besplatni oglasnik za oglašavanje životinja. Poklanjanje i udomljavanje kućnih ljubimaca i kućni ljubimci za udomljavanje u malim oglasima', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ["udomljavam mačku", "udomljavam psa", "pronađen pas", "pronađena maca", "udomljavanje", "poklanjam psa", "poklanjam", "kucni ljubimci", "kućni ljubimci"],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Udomi.net', // set false to total remove
            'description' => 'Besplatni oglasnik za oglašavanje i udomljavanje životinja.', // set false to total remove
            'url'         => 'http://udomi.net', // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => 'Udomi.net',
            'images'      => ['/storage/share.jpg'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];

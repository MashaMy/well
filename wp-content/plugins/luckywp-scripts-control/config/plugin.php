<?php
return [
    'textDomain' => 'luckywp-scripts-control',
    'bootstrap' => [
        'admin',
        'activation',
        'front',
        'welcome',
    ],
    'pluginsLoadedBootstrap' => [
        'settings',
    ],
    'components' => [
        'admin' => \luckywp\scriptsControl\admin\Admin::class,
        'activation' => \luckywp\scriptsControl\plugin\Activation::class,
        'front' => \luckywp\scriptsControl\front\Front::class,
        'items' => \luckywp\scriptsControl\plugin\repositories\ItemRepository::class,
        'options' => \luckywp\scriptsControl\core\wp\Options::class,
        'rate' => \luckywp\scriptsControl\admin\Rate::class,
        'request' => \luckywp\scriptsControl\core\base\Request::class,
        'settings' => [
            'class' => \luckywp\scriptsControl\plugin\Settings::class,
            'initGroupsConfigFile' => __DIR__ . '/settings.php',
        ],
        'view' => \luckywp\scriptsControl\core\base\View::class,
        'welcome' => \luckywp\scriptsControl\modules\welcome\Welcome::class,
    ],
];

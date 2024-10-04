<?php

return [
    'web_ucbackendmodule' => [
        'parent' => 'web',
        'position' => ['after' => 'web_info'],
        'access' => 'user',
        'workspaces' => 'live',
        'path' => '/module/page/uc-backend-module',
        'icon'   => 'EXT:custom_user_settings/Resources/Public/Icons/Extension.png',
        'labels' => 'LLL:EXT:custom_user_settings/Resources/Private/Language/locallang_db.xlf',
        'extensionName' => 'CustomUserSettings',
        'controllerActions' => [
            \Passionweb\CustomUserSettings\Controller\UserSettingsController::class => 'showSettings',
        ],
    ]
];

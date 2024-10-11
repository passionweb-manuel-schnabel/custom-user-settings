<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

$lll = 'LLL:EXT:custom_user_settings/Resources/Private/Language/locallang_db.xlf:';

$GLOBALS['TYPO3_USER_SETTINGS']['columns']['tx_passionweb_check'] = [
    'label' => $lll . 'tx_passionweb_check',
    'type' => 'check',
    'renderType' => 'checkbox',
];

$GLOBALS['TYPO3_USER_SETTINGS']['columns']['tx_passionweb_contributors'] = [
    'label' => $lll . 'tx_passionweb_contributors',
    'type' => 'text',
];

ExtensionManagementUtility::addFieldsToUserSettings(
    '--div--;'. $lll . 'tx_passionweb_user_settings_tab' .',tx_passionweb_check, tx_passionweb_contributors',
    'after:lang',
);




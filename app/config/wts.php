<?php
return array(
    'appLanguages' => array('en', 'de', 'es', 'fr', 'it', 'nl', 'sv'),
    'providers' => array('Google', 'Twitter'),
    'availLanguages' => array('af', 'ak', 'ar', 'as', 'ast', 'be', 'bg', 'bn-BD', 'bn-IN', 'br', 'bs', 'ca', 'cs', 'cy',
        'da', 'de', 'el', 'en-GB', 'en-US', 'en-ZA', 'eo', 'es-AR', 'es-CL', 'es-ES', 'es-MX', 'et', 'eu', 'fa', 'ff', 'fi',
        'fr', 'fy-NL', 'ga-IE', 'gd', 'gl', 'gu-IN', 'he', 'hi-IN', 'hr', 'hu', 'hy-AM', 'id', 'is', 'it', 'ja', 'ja-JP-mac',
        'ka', 'kk', 'km', 'kn', 'ko', 'ku', 'lg', 'lij', 'lt', 'lv', 'mai', 'mk', 'ml', 'mn', 'mr', 'ms', 'nb-NO', 'ne-NP',
        'nl', 'nn-NO', 'nr', 'nso', 'oc', 'or', 'pa-IN', 'pl', 'pt-BR', 'pt-PT', 'rm', 'ro', 'ru', 'rw', 'si', 'sk', 'sl', 'son',
        'sq', 'sr', 'ss', 'st', 'sv-SE', 'ta', 'ta-LK', 'te', 'th', 'tn', 'tr', 'ts', 'uk', 've', 'vi', 'xh', 'zh-CN', 'zh-TW', 'zu',
    ),
    'central' => 'central.txt',
    'parsers' => array(
        'dtd' => 'MozDtdParser',
        'ent' => 'MozDtdParser',
        'properties' => 'MozPropertiesParser',
        'description' => 'MozPropertiesParser',
        'ini' => 'MozIniParser',
        'inc' => 'MozIncParser',
        'json' => 'MozJsonParser',
        '*' => 'General'
    ),
    'ignore' => array(
        'xml',
        'css',
        'js',
        'manifest',
        'done',
        'rdf',
    ),
    'SHORT_LOCALES' => array('en' => 'en-US', 'ga' => 'ga-IE', 'pt' => 'pt-PT', 'sv' => 'sv-SE', 'zh' => 'zh-CN'),

    # Taken from Fireplace's hearth/media/js/l10n.js
    'SUPPORTED_LOCALES' => array(
        'de', 'en-US', 'es', 'fr', 'pl', 'pt-BR',

        # List of languages from AMO's settings (excluding mkt's active locales).
        'af', 'ar', 'bg', 'ca', 'cs', 'da', 'el', 'eu', 'fa',
        'fi', 'ga-IE', 'he', 'hu', 'id', 'it', 'ja', 'ko', 'mn', 'nl',
        'pt-PT', 'ro', 'ru', 'sk', 'sl', 'sq', 'sv-SE', 'uk', 'vi',
        'zh-CN', 'zh-TW',
        # The hidden list from AMO's settings:
        'cy', 'sr', 'tr',
    ),

    'adminEmail' => 'techadmin@babelzilla.org',
    'tempFolder' => $_SERVER['DOCUMENT_ROOT'] . '/../upload/temp/',
    'uploadFolder' => $_SERVER['DOCUMENT_ROOT'] . '/../uploads/projects/',
    'issueFolder' => $_SERVER['DOCUMENT_ROOT'] . '/../uploads/issues/',
    'repoFolder' => $_SERVER['DOCUMENT_ROOT'] . '/../uploads/repos/',
    'default_group' => 'user',

);
<?php
use Cake\Core\Plugin;

Plugin::load('BootstrapUI');

// Habilita o parseamento de datas localizadas
date_default_timezone_set('America/Fortaleza');

/**
 * Locale Formats
 */
\Cake\I18n\Time::setToStringFormat([IntlDateFormatter::MEDIUM, IntlDateFormatter::SHORT]);
\Cake\I18n\Time::setToStringFormat('dd/MM/YYYY HH:mm');

\Cake\Database\Type::build('date')
    ->useLocaleParser()
    ->setLocaleFormat('dd/MM/yyyy');

\Cake\Database\Type::build('datetime')
    ->useLocaleParser()
    ->setLocaleFormat('dd/MM/yyyy HH:mm');

\Cake\Database\Type::build('timestamp')
    ->useLocaleParser()
    ->setLocaleFormat('dd/MM/yyyy HH:mm');

\Cake\Database\Type::build('decimal')
    ->useLocaleParser();

\Cake\Database\Type::build('float')
    ->useLocaleParser();

ini_set('intl.default_locale', 'pt_BR');

/**
 * Default formats
 */
\Cake\I18n\Time::setToStringFormat('dd/MM/yyyy HH:mm:ss');
\Cake\I18n\Date::setToStringFormat('dd/MM/yyyy');
\Cake\I18n\FrozenTime::setToStringFormat('dd/MM/yyyy HH:mm:ss');
\Cake\I18n\FrozenDate::setToStringFormat('dd/MM/yyyy');


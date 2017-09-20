<?php

/**
 * Configure cache engine
 */

$cacheEngine = 'File';
$cachePrefix = 'ussd_';
$cacheDirectory = 'ussd';

Cache::config('ussd', array(
    'engine' => $cacheEngine,
    'prefix' => $cachePrefix,
    'path' => CACHE . $cacheDirectory . DS,
    'serialize' => ($cacheEngine === 'File'),
    'duration' => '+999 days'
));

/**
 * Configure logging
 */
CakeLog::config('ussd', array(
    'engine' => 'File',
    'scopes' => array('ussd'),
    'file' => 'ussd.log',
));
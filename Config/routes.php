<?php

/* 
 * Handles USSD routes
 */

Router::connect('/ussd/*', array(
    'controller' => 'UssdApp',
    'action' => 'delegate',
    'plugin' => 'ussd'
));

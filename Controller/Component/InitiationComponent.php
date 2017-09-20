<?php

/**
 * InitiationComponent
 *
 * @author Victor J. Owusu <jowusu837@gmail.com>
 */
App::uses('UssdComponent', 'Ussd.Controller/Component');

class InitiationComponent extends UssdComponent {

    public function run() {
        return "Hi!" . PHP_EOL . "This is your initial page";
    }

}

<?php

/**
 * Description of Page2Component
 *
 * @author Victor J. Owusu <jowusu837@gmail.com>
 */
App::uses('UssdComponent', 'Ussd.Controller/Component');

class Page2Component extends UssdComponent {

    public function run() {

        return "This is page 2.";
    }

}

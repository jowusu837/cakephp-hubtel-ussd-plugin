<?php

/**
 * Extend this class to kickstart your ussd components
 *
 * @author Victor J. Owusu <jowusu837@gmail.com>
 */
App::uses('Component', 'Controller');
App::uses('UssdRequest', 'Ussd.Lib');
App::uses('UssdResponse', 'Ussd.Lib');

class UssdComponent extends Component {

    /**
     * Leave this alone!
     * @var string 
     */
    protected $status = 'success';

    /**
     * Current ussd request
     * 
     * @var UssdRequest 
     */
    protected $request;

    public function __construct(\ComponentCollection $collection, $ussdRequest = array()) {
        parent::__construct($collection, array());
        $this->request = json_decode(json_encode($ussdRequest));
    }
    
    /**
     * This is where the actual page logic goes.
     * @throws NotImplementedException
     */
    protected function run(){
        throw new NotImplementedException;
    }

}

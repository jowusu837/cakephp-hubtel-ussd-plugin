<?php

App::uses('AppController', 'Controller');
App::uses('UssdRequest', 'Ussd.Lib');
App::uses('UssdResponse', 'Ussd.Lib');

class UssdAppController extends AppController {

    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('delegate');
    }

    public function delegate() {
        $result = null;
        try {
            $ussdRequest = $this->_getUssdRequestInstance();
            $object = $this->_getPage($ussdRequest);
            $component = 'Ussd.' . Inflector::camelize($object);
            $this->{$component} = $this->Components->load($component, $ussdRequest);
            $this->{$component}->initialize($this);
            $return = $this->{$component}->run($ussdRequest);
            if ($this->{$component}->status == 'success') {
                $result = $this->_success($return);
            }
            else {
                $result = $this->_done($return);
            }
        } catch (Exception $e) {
            CakeLog::write('ussd', "Error: " . $e->getMessage() . ". Line: " . $e->getLine() . ". Trace: " . $e->getTraceAsString());
            $result = $this->_error($e->getMessage(), $e->getCode(), $result);
        }
        $this->response->type('json');
        $this->response->statusCode(200);
        $this->response->body($result);
        $this->response->send();
        $this->_stop();
    }

    /**
     * Get current USSD request instance.
     * 
     * @return array
     * @throws Exception
     */
    private function _getUssdRequestInstance() {
        $ussdRequest = json_decode($this->request->input(), TRUE);

        if (!$ussdRequest || empty($ussdRequest)) {
            throw new Exception('Invalid USSD request!');
        }

        return $ussdRequest;
    }

    protected function _format($responseType, $message) {
        $response = new UssdResponse();
        $response->Type = $responseType;
        $response->Message = $message;
        return json_encode($response);
    }

    protected function _success($message) {
        return $this->_format(UssdRequest::RESPONSE, $message);
    }

    protected function _done($message) {
        return $this->_format(UssdResponse::RELEASE, $message);
    }

    protected function _error($message = 'Unknown error!') {
        return $this->_format(UssdResponse::RELEASE, $message);
    }

    /**
     * Get the page to render session.
     * @param array $ussdRequest
     * @return string
     */
    private function _getPage($ussdRequest) {
        if (!$ussdRequest['Type'] || $ussdRequest['Type'] == UssdRequest::INITIATION || $ussdRequest['Sequence'] === 1) {
            return UssdRequest::INITIATION;
        }

        return 'page' . $ussdRequest['Sequence'];
    }

}

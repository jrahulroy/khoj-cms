<?php

class AdminController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function uploadAction() {
        $adapter = new Zend_File_Transfer_Adapter_Http();

        $adapter->setDestination('C:\temp');

        if (!$adapter->receive()) {
            $messages = $adapter->getMessages();
            echo implode("\n", $messages);
        }
        $this->view->name = $adapter->getFileName(null, false);
    }

}

<?php

class ClueController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $this->view->title = "Clue";
    }

    public function somethingAction() {
        $this->view->title = "Something";
    }

}

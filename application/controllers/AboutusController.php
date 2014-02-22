<?php

class AboutusController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        $layout = $this->_helper->layout();
        $layout->setLayout('fullwidth');
    }

    public function indexAction() {
        
    }

    public function eventAction() {
        $this->view->title = "The Event";
    }

    public function festAction() {
        $this->view->title = "The Fest";
    }

    public function collegeAction() {
        $this->view->title = "The College";
    }

    public function teamAction() {
        $this->view->title = "The Team";
    }

    public function khojAction() {
        $this->view->title = "The Khoj";
    }

    public function tinycreationsAction() {
        $this->view->title = "The Tiny Creations";
    }

    public function contactusAction() {
        $this->view->title = "Contact Us";
    }

    public function rulesAction() {
        $this->view->title = "Rules";
    }

    public function feedbackAction() {
        $this->view->title = "Feedback";
    }

}

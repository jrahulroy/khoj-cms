<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        //$this->view->title = "Welcome";
        //$this->view->renderLikebox = 1;
        /* if (Zend_Auth::getInstance()->hasIdentity()) {
          $this->view->welcommsg = "You are a Logged in User";
          $ret = Zend_Auth::getInstance()->getIdentity();
          //var_dump($ret);
          //echo $ret['userid'];
          //echo $ret['first'];
          }
          else{

          } */
        $layout = $this->_helper->layout();
        $layout->setLayout('homepage');
    }

}

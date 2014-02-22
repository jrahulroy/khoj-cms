<?php

class ForumController extends Zend_Controller_Action {

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
        $this->_redirect('/forum/discuss/');
    }

    public function discussAction() {
        $token = $this->getRequest()->getParam('no', false);
        $questions = new Application_Model_DbTable_Questions;
        $count = $questions->getCount();
        //echo $count;
        if ($token && $token <= $count) {
            $this->view->question = $token;
            $this->view->title = "Discuss Question No " . $token;
        } else {
            $this->view->title = "Discuss Board";
            $this->view->count = $count;
            $this->render("discusslist");
        }
    }

}

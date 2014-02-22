<?php

class UserController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        $this->view->controller = $this->_request->getControllerName();
    }

    public function indexAction() {
        // action body
    }

    public function registerAction() {
        // action body
        $this->view->title = "Register";

        $form = new Application_Form_Register();
        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            //var_dump($formData);
            if ($form->isValid($formData)) {
                echo 'success';
                unset($formData['captcha']);
                unset($formData['submit']);
                unset($formData['csrf']);

                $users = new Application_Model_DbTable_Users();
                $users->insert($formData);

                $auth = Zend_Auth::getInstance();
                $auth->clearIdentity();

                $this->view->welcommsg = "Registration Successful. Please ReLogin to Continue";
            } else {
                $form->populate($formData);
                $this->view->form = $form;
            }
        } else {
            $identity = Zend_Auth::getInstance()->getIdentity();
            if ($identity['first']) {
                $options = $identity;

                //$options = $identity;
                //$this->view->bio = $identity['bio'];
                //var_dump($options);
                $form = new Application_Form_Register($options);
                $this->view->form = $form;
            } else {
                $this->render("registerfb");
            }
        }
    }

    public function loginAction() {
        $this->view->welcommsg = "Please Login to Continue";
    }

    public function loginfacebookAction() {

        $token = $this->getRequest()->getParam('token', false);
        if ($token == false) {
            $this->view->welcommsg = "Facebook Login Failed";
            return false; // redirect instead
        }

        $auth = Zend_Auth::getInstance();
        $adapter = new Zend_Auth_Adapter_Facebook($token);
        $result = $auth->authenticate($adapter);
        if ($result->isValid()) {
            $user = $adapter->getUser();
            $auth->getStorage()->write($user);
            $this->view->welcommsg = $auth->getIdentity();
            //return true; // redirect instead
            $identity = Zend_Auth::getInstance()->getIdentity();
            if (!$identity['first'])
                $this->_redirect('/');
            else
                $this->_redirect('user/register');
        }
        //return false; // redirect instead
    }

    public function logoutAction() {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        $this->_redirect('/');
    }

}

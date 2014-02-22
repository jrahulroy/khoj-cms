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
        $users = new Application_Model_DbTable_Users();
        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            // var_dump($formData);
            if ($form->isValid($formData)) {
                //echo 'success';

                if ($formData['password'] != $formData['conformpassword']) {
                    $this->view->errorMessage = "Password and confirm password don't match.";

                    $formData['password'] = "";
                    $formData['conformpassword'] = "";
                    $form->populate($formData);
                    $this->view->form = $form;
                    return;
                }
                if ($users->checkUnique($formData['username'])) {
                    $this->view->errorMessage = "Name already taken. Please choose another one.";

                    $formData['password'] = "";
                    $formData['conformpassword'] = "";
                    $form->populate($formData);
                    $this->view->form = $form;
                    return;
                }

                unset($formData['captcha']);
                unset($formData['conformpassword']);
                unset($formData['submit']);
                unset($formData['csrf']);


                $users->insert($formData);

                //$auth = Zend_Auth::getInstance();
                //$auth->clearIdentity();

                $this->view->welcommsg = "Registration Successful. Please ReLogin to Continue";
                return;
            } else {

                $formData['password'] = "";
                $formData['conformpassword'] = "";
                $form->populate($formData);
            }
        }
        $this->view->form = $form;
        /* else{
          $identity = Zend_Auth::getInstance()->getIdentity();
          if($identity['first']){
          $options = $identity;

          //$options = $identity;
          //$this->view->bio = $identity['bio'];
          //var_dump($options);
          $form = new Application_Form_Register($options);
          $this->view->form = $form;
          }
          /* else
          {
          $this->render("registerfb");
          } */
        //}
    }

    public function loginAction() {
        $this->view->welcommsg = "Please Login to Continue";
        $this->view->title = "Login";

        $form = new Application_Form_Login();
        $this->view->form = $form;
        $users = new Application_Model_DbTable_Users();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $data = $form->getValues();
                $auth = Zend_Auth::getInstance();
                $authAdapter = new Zend_Auth_Adapter_DbTable($users->getAdapter(), 'users');
                $authAdapter->setIdentityColumn('username')
                        ->setCredentialColumn('password');
                $authAdapter->setIdentity($data['username'])
                        ->setCredential($data['password']);
                $result = $auth->authenticate($authAdapter);
                if ($result->isValid()) {
                    /* $storage = new Zend_Auth_Storage_Session();
                      $storage->write($authAdapter->getResultRowObject());
                      $this->_redirect('auth/home'); */

                    $user = $authAdapter->getResultRowObject();
                    //var_dump($user);
                    //echo $user->email;
                    $auth->getStorage()->write($user);
                    $this->view->welcommsg = $auth->getIdentity();
                    //return true; // redirect instead
                    $identity = Zend_Auth::getInstance()->getIdentity();
                    //if(!$identity['first'])
                    $this->_redirect('/hunt/');
                    /* else 
                      $this->_redirect('user/register'); */
                } else {
                    $this->view->errorMessage = "Invalid username or password. Please try again.";
                }
            }
        }
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

    public function whatisthisAction() {
        $this->view->title = "What is This..?";
    }

}

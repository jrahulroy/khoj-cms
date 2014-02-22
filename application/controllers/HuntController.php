<?php

class HuntController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        $identity = Zend_Auth::getInstance()->getIdentity();
        /* if($identity['first'])
          $this->_redirect('user/register'); */
    }

    public function indexAction() {
        $this->_redirect('hunt/dashboard');
    }

    public function dashboardAction() {
        $this->view->title = "Dashboard";
        $this->view->renderLikebox = 1;
        if (Zend_Auth::getInstance()->hasIdentity()) {


            //$this->view->welcommsg = "You are a Logged in User";
            $identity = Zend_Auth::getInstance()->getIdentity();
            $status = new Application_Model_DbTable_Status();
            $select = $status->select()->where('userid = ?', $identity->userid);
            if ($stat = $status->fetchRow($select)) {
                
            } else {
                $data['userid'] = $identity->userid;
                $data['currquest'] = 1;
                $data['currpoints'] = 0;
                $status->insert($data);
                $this->_redirect('hunt/dashboard');
            }

            $currquest = $stat['currquest'];
            $currpoints = $stat['currpoints'];

            $this->view->currquest = $currquest;
            $this->view->currpoints = $currpoints;
        } else {
            $this->_redirect('user/login');
        }
    }

    public function questionAction() {
        if (Zend_Auth::getInstance()->hasIdentity()) {

            $token = $this->getRequest()->getParam('clue', false);
            if ($token) {
                $this->_redirect('hunt/clue');
            }
            $identity = Zend_Auth::getInstance()->getIdentity();
            $status = new Application_Model_DbTable_Status();
            $select = $status->select()->where('userid = ?', $identity->userid);
            $stat = $status->fetchRow($select);



            //$this->view->welcommsg = "You are a Logged in Us
            //$this->view->currquest = $currquest;
            //$this->view->currpoints = $currpoints;

            if ($this->_request->isPost()) {
                $formData = $this->_request->getPost();

                $questno = $this->getRequest()->getParam('no', false);

                $questions = new Application_Model_DbTable_Questions();
                $select = $questions->select()->where('questionno = ?', $questno);
                $question = $questions->fetchRow($select);

                if ($formData['answer'] == $question['answer']) {
                    if ($stat['currquest'] == $questno) {
                        $data['currquest'] = $stat['currquest'] + 1;
                        $data['currpoints'] = $stat['currpoints'] + $question['currpoints'];
                        $status->update($data, "userid = " . $stat['userid']);
                        if ($question['currpoints'] > 50) {
                            $data2['currpoints'] = $question['currpoints'] - 1;
                            $questions->update($data2, "questionno = " . $questno);
                        }
                    }

                    $this->_redirect('hunt/question/no/' . ($questno + 1));
                } else {
                    //Print Wrror Message
                }
            }
            $questions = new Application_Model_DbTable_Questions();
            $questno = $this->getRequest()->getParam('no', $stat['currquest']);
            $count = $questions->getCount();

            //var_dump($questno);
            //Get Question Parameter
            //If the Question question is less than current question, Display the Question
            // Or Else redirect to 'gotcha' Action
            if ($questno > $stat['currquest'])
                $this->_redirect('hunt/gotcha');

            if ($questno == $count + 1) {
                $this->_redirect('hunt/complete');
            }
            $select = $questions->select()->where('questionno = ?', $questno);

            //$questions->select("questionno = " . $questno);
            $question = $questions->fetchRow($select);


            $this->view->title = "Level " . $questno;
            $this->view->question = $question;
            //echo $question['schints'];
            //var_dump($question);
            $db = Zend_Db_Table::getDefaultAdapter();
            $select = $db->select()->from('status')->join('users', 'status.userid = users.userid')->where('currquest = ?', $stat['currquest']);
            $result = $db->fetchAll($select);

            //$select = $status->select()->where('currquest = ?', $stat['currquest']);
            $this->view->people = $result;
            $this->view->renderPeopleSameLevel = 1;
        } else {
            $this->_redirect('user/register');
        }
    }

    public function leaderboardAction() {
        $this->view->title = "Leaderboard";
        $this->view->welcommsg = "Here is the Leaderboard";

        $db = Zend_Db_Table::getDefaultAdapter();
        $select = $db->select()->from('status')->join('users', 'status.userid = users.userid')->order(array('currquest DESC', 'edit'));



        $result = $db->fetchAll($select);
        $this->view->leaders = $result;

        //var_dump($result);
    }

    public function gotchaAction() {
        $this->view->title = "What are you trying to do";
        $this->view->welcommsg = "What are you tryin to do";
    }

    public function completeAction() {
        $this->view->title = "Complete";
    }

    public function clueAction() {
        $this->view->title = "Complete";
    }

}

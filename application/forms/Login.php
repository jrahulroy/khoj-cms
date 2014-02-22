<?php

class Application_Form_Login extends Zend_Form {

    public function __construct($options = null) {
        // Set the method for the display form to POST
        parent::__construct($options);

        $this->setName('Login');

        $this->setMethod('post');

        $this->addElement('text', 'username', array(
            'label' => 'Username:',
            'required' => true,
            'filters' => array('StringTrim'),
        ));
        // Add an email element
        $this->addElement('password', 'password', array(
            'label' => 'Password:',
            'required' => true,
            //'value' => $options['email'],
            'filters' => array('StringTrim')
                /* 'validators' => array(
                  'EmailAddress',
                  ) */
        ));

        /* $this->addElement('checkbox', 'emailchk', array(

          'value' => true
          )
          ); */

        /* $this->addElement('text', 'phone', array(
          'label'      => 'Phone Number:',
          'required'   => true,
          'filters'    => array('StringTrim'),
          ));
          /*$this->addElement('checkbox', 'phonechk', array(
          'label'      => 'Display Value on Profile:',
          'value' => true
          )
          ); */
        /*
          $this->addElement('text', 'fbusername', array(
          'label'      => 'Facebook Username:',
          'required'   => true,
          'value' => $options['fbusername'],
          'filters'    => array('StringTrim'),
          ));
          /*$this->addElement('checkbox', 'fbusernamechk', array(
          'label'      => 'Display Value on Profile:',
          'value' => true
          )
          ); */
        /*
          $this->addElement('text', 'rollno', array(
          'label'      => 'Roll Number:',
          'required'   => true,
          'filters'    => array('StringTrim'),
          ));

          $this->addElement('text', 'branch', array(
          'label'      => 'Branch:',
          'required'   => true,
          'filters'    => array('StringTrim'),
          ));

          $this->addElement('text', 'year', array(
          'label'      => 'Year:',
          'required'   => true,
          'filters'    => array('StringTrim'),
          ));


          // Add the comment element
          $this->addElement('textarea', 'bio', array(
          'label'      => 'Bio:',
          'required'   => true,
          'cols' => 30,
          'rows' => 5,
          'value' => $options['bio'],
          'filters'    => array('StringTrim'),
          'validators' => array(
          array('validator' => 'StringLength', 'options' => array(0, 150))
          )
          ));

          // Add a captcha
          $this->addElement('captcha', 'captcha', array(
          'label'      => 'Please enter the 5 letters displayed below:',
          'required'   => true,
          'captcha'    => array(
          'captcha' => 'Dumb',
          'wordLen' => 5,
          'timeout' => 300
          )
          )); */

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore' => true,
            'label' => 'Login',
        ));

        // And finally add some CSRF protection
        /* $this->addElement('hash', 'csrf', array(
          'ignore' => true,
          )); */
    }

}

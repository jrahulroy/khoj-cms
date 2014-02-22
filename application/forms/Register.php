<?php

class Application_Form_Register extends Zend_Form {

    public function __construct($options = null) {
        // Set the method for the display form to POST
        parent::__construct($options);

        $this->setName('Register');

        $this->setMethod('post');

        $this->addElement('text', 'firstname', array(
            'label' => 'First Name: *',
            'required' => true,
            'value' => $options['name'],
            'filters' => array('StringTrim'),
        ));
        $this->addElement('text', 'lastname', array(
            'label' => 'Last Name:',
            'required' => false,
            'value' => $options['name'],
            'filters' => array('StringTrim'),
        ));
        $this->addElement('text', 'username', array(
            'label' => 'Username: *',
            'required' => true,
            'value' => $options['name'],
            'filters' => array('StringTrim'),
        ));
        $this->addElement('password', 'password', array(
            'label' => 'Password: *',
            'required' => true,
        ));
        $this->addElement('password', 'conformpassword', array(
            'label' => 'Conform Password: *',
            'required' => true,
        ));
        // Add an email element
        $this->addElement('text', 'email', array(
            'label' => 'Your email address: *',
            'required' => true,
            'value' => $options['email'],
            'filters' => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));

        /* $this->addElement('checkbox', 'emailchk', array(

          'value' => true
          )
          ); */

        $this->addElement('text', 'phone', array(
            'label' => 'Phone Number: *',
            'required' => true,
            'filters' => array('StringTrim'),
        ));
        /* $this->addElement('checkbox', 'phonechk', array(
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

        $foo = new Zend_Form_Element_Text('fbusername');
        $foo->setLabel('Facebook UserName:')
                ->setDescription('<a href="http://khojthehunt.tk/user/whatisthis" class="what">What&#39;s This</a> <p class="what"> Used to get your Profile Picture</p>')
                ->setDecorators(array(
                    'ViewHelper',
                    array('Description', array('escape' => false, 'tag' => false)),
                    array('HtmlTag', array('tag' => 'dd')),
                    array('Label', array('tag' => 'dt')),
                    'Errors',
        ));
        $this->addElement($foo);



        $this->addElement('text', 'rollno', array(
            'label' => 'Roll Number: ',
            'filters' => array('StringTrim'),
        ));

        $this->addElement('text', 'branch', array(
            'label' => 'Branch: ',
            'filters' => array('StringTrim'),
        ));

        $this->addElement('text', 'college', array(
            'label' => 'College: ',
            'filters' => array('StringTrim'),
        ));

        $this->addElement('text', 'year', array(
            'label' => 'Year:',
            'filters' => array('StringTrim'),
        ));

        /*
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
         */
        // Add a captcha
        /* $this->addElement('captcha', 'captcha', array(
          'label'      => 'Captcha:',
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
            'label' => 'Register',
        ));

        // And finally add some CSRF protection
        /* $this->addElement('hash', 'csrf', array(
          'ignore' => true,
          )); */
    }

}

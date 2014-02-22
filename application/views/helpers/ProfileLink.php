<?php

class Zend_View_Helper_ProfileLink extends Zend_View_Helper_Abstract {

    /**
     * View instance
     *
     * @var  Zend_View_Interface
     */
    public $view;

    public function profileLink() {
        $khojconfig = Zend_Registry::get('khoj-config');
        $baseUrl = $this->view->baseUrl();

        $auth = Zend_Auth::getInstance();

        $url = $this->view->baseUrl('/user/login');
        $regurl = $this->view->baseUrl('/user/register');
        //'<a href="#" id="fbc-login-button">Login with Facebook</button>'
        $html = //'<a href="#" id="fbc-login-button">'. 
                '<a href="' . $url . '">' . $this->view->translate('Login') . '</a> <span> | </span>' .
                '<a href="' . $regurl . '">' . $this->view->translate('Register') . '</a>';
        /* .'</a>' . "<script type='text/javascript'>
          window.fbAsyncInit = function() {
          FB.init({
          appId      : '" . $khojconfig->facebook->appId . "',
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          oauth      : true, // enable OAuth 2.0
          xfbml      : true  // parse XFBML
          });

          button = document.getElementById('fbc-login-button');
          button.onclick = function() {
          FB.getLoginStatus(function(response) {
          if (response.authResponse) {
          this.location = '" . $baseUrl . "/user/loginfacebook/token/' +  response.authResponse.accessToken;
          }
          else {
          FB.login(function(response) {
          if (response.authResponse) {
          this.location = '" . $baseUrl . "/user/loginfacebook/token/' +  response.authResponse.accessToken;
          }}, {scope: 'email'});
          }
          });

          };
          };

          (function(d){
          var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
          js = d.createElement('script'); js.id = id; js.async = true;
          js.src = '//connect.facebook.net/en_US/all.js';
          d.getElementsByTagName('head')[0].appendChild(js);
          }(document));
          </script>"; */

        if ($auth->hasIdentity()) {
            // here have to make amendments to what you have 
            // in your identity.
            $identity = $auth->getIdentity();
            $fname = '<a>' . $identity->firstname . '</a>';
            // $url = $this->view->baseUrl('/user/profile');
            //$fnameLink = "<a href=\"$url\"/>$fname</a>";
            $html = $fname . ' <span>|</span> <a href="' . $baseUrl . '/user/logout">'
                    . $this->view->translate('Logout') . '</a>';
        }

        return '<div id="right_title_wrap">' . $html . '</div>';
        //return "hello";
        //var_dump("i am executed");
    }

    /**
     * Get Zend_View instance
     *
     * @param Zend_View_Interface $view
     */
    public function setView(Zend_View_Interface $view) {
        $this->view = $view;
    }

}

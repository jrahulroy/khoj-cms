<?php

class Zend_View_Helper_1BaseUrl {

    function baseUrl() {
        $base_url = substr($_SERVER['PHP_SELF'], 0, -9);
        return $base_url;
    }

}

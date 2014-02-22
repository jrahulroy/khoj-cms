<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initNavigationXml()
    {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/navigation.ini');
        $navigation = new Zend_Navigation($config);
        $view->navigation($navigation);
    }
    protected function _initKhojConfig()
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/khoj.ini', APPLICATION_ENV);
        Zend_Registry::set('khoj-config', $config);

        return $config;
    }
	

}


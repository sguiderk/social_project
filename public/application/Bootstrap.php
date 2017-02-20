<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    private $_acl = null;


    public function init(){
        $bootstrap = $this->getInvokeArg('bootstrap');
        $options = $bootstrap->getOption('resources');

        $contextSwitch = $this->_helper->getHelper('contextSwitch');
        $contextSwitch  ->addActionContext('index', array('json'))
            ->addActionContext('get', array("json"))
            ->addActionContext('post', array("json"))
            ->addActionContext('put', array("json"))
            ->addActionContext('delete', array("json"))
            ->initContext('json');
    }

    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    protected function _initRequest()
    {
        $this->bootstrap('FrontController');
        $front = $this->getResource('FrontController');
        $request = $front->getRequest();
        if (null === $front->getRequest()) {
            $request = new Zend_Controller_Request_Http();
            $front->setRequest($request);
        }
        return $request;
    }


    protected function _initRestRoute()
    {
        $this->bootstrap('Request');
        $front = $this->getResource('FrontController');
        $restRoute = new Zend_Rest_Route($front, array(), array(
            'rest' => array()
        ));
        $front->getRouter()->addRoute('routerest', $restRoute);

    }

    protected function _initAutoload()
    {
        $modelLoader = new Zend_Application_Module_Autoloader(array(
            'namespace' => "",
            'basePath'  => APPLICATION_PATH
        ));

        if(Zend_Auth::getInstance()->hasIdentity()){
            Zend_Registry::set('role',Zend_Auth::getInstance()->getStorage()->read()->role);
        }else{
            Zend_Registry::set('role','guest');
        }


        $this -> _acl = new Application_Model_MyAcl();
        $this -> _acl_auth = Zend_Auth::getInstance();


        $fc = Zend_Controller_Front::getInstance();
        $fc ->registerPlugin(new Plugin_AccessCheck($this->_acl));

        return $modelLoader;
    }


    /*  protected function _initNavigation()
     {
         $view = new Zend_View();



         $this->bootstrap("view") ;
         $view= $this->getResource('view') ;

     } */


    /* protected function _initViewHelper()
    {

    	$view = new Zend_View();

    	$this->bootstrap('layout');

    	$layout = $this->getResource('layout');

 
     
        $config = new Zend_Config_Xml(APPLICATION_PATH.'/configs/navigation.xml', 'nav');
    	$navContainer = new Zend_Navigation($config);


    	$view ->navigation(navContainer);
    	

    } */



    protected function _initView()
    {
        //Initialize view


        $view = new Zend_View();
        $view->headTitle('Reaseau social')->setSeparator(' - ');

        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
            'ViewRenderer');
        $viewRenderer->setView($view);
        //Return it, so that it can be stored by the bootstrap


/*        if(Zend_Auth::getInstance()->hasIdentity()){
            $userInfo = Zend_Auth::getInstance()->getStorage()->read();
            $view->loginHeader = $userInfo;

        }else {
            $view->isconnected = false;
        }
*/


        return $view;
    }


    function _initViewHelpers(){

        $view = new Zend_View();

        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
            'ViewRenderer');
        $viewRenderer->setView($view);
        //Return it, so that it can be stored by the bootstrap
        $config = new Zend_Config_Xml(APPLICATION_PATH.'/configs/navigation.xml', 'nav');
        $navContainer = new Zend_Navigation($config);


        $view->navigation($navContainer)->setAcl($this->_acl)->SetRole(Zend_Registry::get('role'));


        if(Zend_Auth::getInstance()->hasIdentity()){
            $userInfo = Zend_Auth::getInstance()->getStorage()->read();
            $view->loginHeader = $userInfo;

        }else {
            $view->isconnected = false;
        }

        $view->navigation()->menu()
            ->setUlClass('links');
        return $view;
    }




}


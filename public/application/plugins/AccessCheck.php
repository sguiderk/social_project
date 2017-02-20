<?php

/**
 * Created by PhpStorm.
 * User: sguiderk
 * Date: 07/02/2017
 * Time: 14:20
 */
class Plugin_AccessCheck extends Zend_Controller_Plugin_Abstract{

    private $_acl =null;

    public function __construct(Zend_Acl $acl){

        $this-> _acl=$acl;
    }

    public  function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        /*$ressource = $request->getControllerName();
        $action = $request->getActionName();

        if(!$this->_acl->isAllowed(Zend_Registry::get('role'),$ressource,$action)){
            $request->setControllerName('FormLogin')
                ->getActionName('index');
        }*/
    }


}
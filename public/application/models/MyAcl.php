<?php

class Application_Model_MyAcl extends Zend_Acl
{
    public function __construct()
    {

        $this->add(new Zend_Acl_Resource('index'));
        $this->add(new Zend_Acl_Resource('news'));
        $this->add(new Zend_Acl_Resource('login'));
        $this->add(new Zend_Acl_Resource('user'));
        $this->add(new Zend_Acl_Resource('user-angular'));
        $this->add(new Zend_Acl_Resource('contact'));
        $this->add(new Zend_Acl_Resource('admin'));


        $this->addRole(new Zend_Acl_Role('manager'));
        $this->addRole(new Zend_Acl_Role('admin'));
        $this->addRole(new Zend_Acl_Role('guest'));


        // Guest may only view content


        $this->allow('manager', 'index');
        $this->allow('manager', 'news');
  

        $this->allow('guest', 'login');

        $this->allow('admin',array('index','news','login','user','contact','admin','user-angular'));


        // Add authoring ACL check
        // $this->allow('member', 'forum', 'update', new MyAcl_Forum_Assertion($auth));
        // NOTE: Dependency on auth object to allow getIdentity() for authenticated user object
    }

}


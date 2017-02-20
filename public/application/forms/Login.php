<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
         

         $this->setMethod('post');
 
        $this->addElement(
            'text', 'username', array(
                'label' => 'Login:',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
 
        $this->addElement('password', 'password', array(
            'label' => 'Mot de pass:',
            'required' => true,
            ));
 
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
            ));

    }


}


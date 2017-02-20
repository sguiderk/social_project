<?php

class Application_Form_Registre extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		
				$this->setAttrib('action','Register');
		        $this->setAttrib('enctype', 'multipart/form-data');
				$this->setMethod('post');

		

		$this->addElement('text','email',array(
		'label' => 'Email',
		'required' => true,
		));
		
		$this->addElement('text','login',
				array('label' => 'Login')
		);
				$this->addElement('password','password',
				array('label' => 'Mot de pass')
		);

       $this->addElement('password', 'password2', array(
        	'validators' => array( array('identical', false, array('token' => 'password'))),
        	'label'=>'Tapez de noveau votre mot de pass'
        	)
        );

		$this->addElement('file', 'attachment', array(
			'label' => 'Photo de profile',
			'validators' => array('Size' => array('min' => 20, 'max' => 1000000)
		)));



					$this->addElement('submit',"S'inscrire");
		
    }


}


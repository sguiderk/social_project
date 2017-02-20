<?php

class Application_Form_Contact extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

        $this->setAttrib('action','contact/index');
        $this->setMethod('post');


        $this->addElement('text','name',array(
            'label' => 'Nom',
            'required' => true,
        ));

        $this->addElement('text','email',array(
            'label' => 'Email',
            'required' => true,
        ));

        $this->addElement('textarea','message',
            array('label' => 'Contenu',
                'size' => 20,
                'rows' => 5
            )
        );

        $this->addElement('submit',"Envoyer");

    }


}


<?php

class Application_Form_Addnews extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        
        $this->setAttrib('action','add');
        $this->setMethod('post');


        $this->addElement('text','title',array(
            'label' => 'Titre',
            'required' => true,
        ));

        $this->addElement('textarea','content',
            array('label' => 'Contenu',
                'size' => 20,
                'rows' => 5
                )
        );

        $this->addElement('submit',"Ajouter");
    }


}


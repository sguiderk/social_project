<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        Zend_Layout::getMvcInstance()->setLayout('layout_admin');

    }

    public function indexAction()
    {
        // action body


        $usermapper = new  Application_Model_UserMapper();

        $result = $usermapper->fetchAll();

        $this -> view -> entries = $result ;

    }

    public function deleteAction()
    {
        // action body
        $id = $this->getRequest()->getParam('user');

        $mapper = new Application_Model_UserMapper();
        $mapper->delete($id);

        $this->_redirect('admin');


        echo 'Votre utilisateur à etait supprimé';
    }

    public function viewuserAction()
    {
        // action body
        

        $usermapper = new  Application_Model_UserMapper();

        $result = $usermapper->fetchAll();

        $this -> view -> entries = $result ;

    }

    public function viewnewsAction()
    {
        // action body


        $usermapper = new  Application_Model_UserMapper();

        $result_user = $usermapper->fetchAll();

        $this -> view -> entries_user = $result_user ;

        $newsmapper = new  Application_Model_NewsMapper();

        $result = $newsmapper->fetchAll();

        $this -> view -> entries_news = $result ;

        $this->view->controller = $this;

    }

   
    public function generatedoctrineAction()
    {
        // action body


   echo shell_exec('sh library/generatedoctrine.sh');


     $this->_helper->viewRenderer->setNoRender(true);


    }


    public function substrwords($text, $maxchar, $end='...') {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                }
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        }
        else {
            $output = $text;
        }
        return $output;
    }


}








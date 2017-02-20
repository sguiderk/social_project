<?php

class Application_Model_UserMapper
{

    protected $_dbTable;


    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_User');
        }
        return $this->_dbTable;
    }


    public function delete($id)
    {
        $user = new Application_Model_User();
        $where = ('id ='.$id);
        $this->getDbTable()->delete($where);

    }

    public function fetchRow($id)
    {
        $user = new Application_Model_User();
        $select = $user->select()->where("userid=?",$id);
        $data = $user->fetchRow($select);
        return $data;
    }


    public function save(Application_Model_User $user)
    {
        $data = array(
            'name'   => $user->getName(),
            'email' => $user->getEmail(),
            'pathimg' => $user->getPathimg(),
            'password' => $user->getPassword(),
        );

        if (null === ($id = $user->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id)
    {
        $resultSet = $this->getDbTable()->find($id);

        $entries_result = array();
        foreach ($resultSet as $row) {

            if($row->id==$id){
                $entry = new Application_Model_User();
                $entry->setId($row->id)
                    ->setName($row->name)
                    ->setEmail($row->email)
                    ->setPathimg($row->pathimg)
                    ->setCompany($row->company);
                $entries_result[] = $entry;
            }

        }
        return $entries_result;

    }


    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_User();
            $entry->setId($row->id)
                ->setName($row->name)
                ->setPassword($row->password)
                ->setPathimg($row->pathimg)
                ->setEmail($row->email);
            $entries[] = $entry;
        }
        return $entries;
    }

}


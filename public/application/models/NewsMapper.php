<?php

class Application_Model_NewsMapper
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
            $this->setDbTable('Application_Model_DbTable_News');
        }
        return $this->_dbTable;
    }


    public function delete($id)
    {
        $news = new Application_Model_News();
        $where = ('id ='.$id);
        $this->getDbTable()->delete($where);

    }

    public function fetchRow($id)
    {
        $news = new Application_Model_News();
        $select = $news->select()->where("id=?",$id);
        $data = $news->fetchRow($select);
        return $data;
    }


    public function save(Application_Model_News $news)
    {
        $data = array(
            'title'   => $news->getTitle(),
            'content' => $news->getContent(),
            'userid' => $news->getUserid(),
            'date' => $news->getDate(),
        );

        if (null === ($id = $news->getId())) {
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
                $entry = new Application_Model_News();
                $entry->setId($row->id)
                    ->setTitle($row->title)
                    ->setContent($row->content)
                    ->setDate($row->date)
                    ->setUserid($row->userid);
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
            $entry = new Application_Model_News();
            $entry->setId($row->id)
                ->setTitle($row->title)
                ->setContent($row->content)
                ->setDate($row->date)
                ->setUserid($row->userid);
            $entries[] = $entry;
        }
        return $entries;
    }

}


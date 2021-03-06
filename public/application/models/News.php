<?php

class Application_Model_News
{

    protected $_id;

    protected $_title;

    protected $_content;

    protected $_date;

    protected $_userid;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid user property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid user property');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }



    public function setId($text)
    {
        $this->_id = (int) $text;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setUserid($text)
    {
        $this->_userid = (int) $text;
        return $this;
    }

    public function getUserid()
    {
        return $this->_userid;
    }

    public function setTitle($text)
    {
        $this->_title = (string) $text;
        return $this;
    }

    public function getTitle()
    {
        return $this->_title;
    }
    
    public function setContent($text)
    {
        $this->_content = (string) $text;
        return $this;
    }

    public function getContent()
    {
        return $this->_content;
    }


    public function setDate($text)
    {
        $this->_date = (string) $text;
        return $this;
    }

    public function getDate()
    {
        return $this->_date;
    }


}


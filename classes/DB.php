<?php
class DB
{
    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

    private function _construct()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=' . Config::get('mysql/host')
            . ';dbname=' . Config::get('mysql/db'),
            Config::get('mysql/username'),
            Config::get('mysql/password'));
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$_instance = new DB();
        }
        return self::$instance;
    }

    public function query($sql, $params = array())
    {
        $this->error = false;
        if ($this->_query = $this->pdo->prepare($sql))
        {
            if(count($params))
            {
                foreach($params as $param)
                    $this->_query->bindValue($x, $param)
            }
        }
    }

    
}
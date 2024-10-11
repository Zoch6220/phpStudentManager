<?php
class Database{
    private static $instance=null;
    private $pbo;

    private function __construct(){
        try{
            $this->pbo = new PDO('mysql:host=localhost;dbname=studentmanager', 'root', 'mysql');
            $this->pbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die('Connection Failed: '.$e->getMessage());
        }

    }
    public static function getInstance(){
        if(self::$instance==null){
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function getConnection(){
        return $this->pbo;
    }

}

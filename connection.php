<?php
class mysqllocal{
    //var $server = 'beparked.mysql.database.azure.com';
    //var $username = 'bpaproj2@beparked';
    //var $password = 'Thetownwhereonlyiwaserased_07';
    //var $database = 'beparked';
    
    //var $server = 'localhost';
    //var $username = 'BeParked';
    //var $password = '79TJTdn56K6f3ke';
    //var $database = 'beparked';
    
    var $server = 'localhost';
    var $username = 'beparked';
    var $password = '1234';
    var $database = 'beparked';
    
    public function server(){
        return $this->server;
    }
    public function username(){
        return $this->username;
    }
    public function password(){
        return $this->password;
    }
    public function database(){
        return $this->database;
    }
}

?>
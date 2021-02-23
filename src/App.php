<?php

namespace xframe\Database;

class App {

    /** 
     * connect to a database
     * 
     * @param string, hostname or IP of database server
     * 
     * @param string, username to use when connecting to database server
     * 
     * @param string, (optional, use null for no password) password for connecting to the database
     * 
     * @param string, name of the database to connect to
     * 
     * @param string, identifier for when using the database
     * 
     * @param string, (optional, use null for none) the servers database engine. default is mysql
     * 
     * @param string, (optional) port number of database server
     * 
    */

    function db_connect($hostname, $username, $password, $database, $id, $engine, $port) {

        // define possibly undefined params
        if($port == null) {

            $port = 3306;

        }

        if($engine == null) {

            $engine = "mysql";

        }

        // connect to database
        try {

            $this->$id = new mysqli($hostname, $username, $password, $database, $port);

        } catch (Exception $e) {

            error($e->getMessage());

        }

    }
  
}

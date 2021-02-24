<?php

namespace xframe\Database;

class App {

    /** 
     * use clause functions 
    */

    use clause;
    use select;

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
     * @param string, (optional, use null for none) the servers database engine. default is mysql
     * 
     * @param string, (optional) port number of database server
     * 
    */

    function connect($hostname, $username, $password, $database, $engine, $port) {

        // define possibly undefined params
        if($port == null) {

            $port = 3306;

        }

        if($engine == null) {

            $engine = "mysql";

        }

        // connect to database
        if(!$this->conn = new \mysqli($hostname, $username, $password, $database, $port)) {

            error("Unable to connect to MySQLi database. Please check your credentials");
                
        }

    }

    /** 
     * compile query
     * 
    */

    function compile() {

        $query = $this->query;

        $query = str_replace("{[table]}", $this->table, $query);

        $query = str_replace("{[column]}", $this->column, $query);

        $query = str_replace("{[where]}", $this->where, $query);

        echo $query;

    }

    /** 
     * execute query
     * 
    */

    function execute() {

        $this->stmt->execute();

    }
  
}

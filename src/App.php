<?php

namespace xframe\Database;

class App {

    /** 
     * use clause functions 
    */

    use clause;
    use select;

    /** 
     * clean all mysqli query parameters
     * 
    */

    function clean() {

        foreach ($this as $key => $value) {
            
            $this->$key = null;

        }

    }

    /** 
     * connect to a database
     * 
     * @param array, all the connection parameters
     * 
     * @return bool, returns if the connection was successful
     * 
    */

    function connect($params) {

        // input validation
        if(!isset($params['port'])) {

            $params['port'] = 3306;

        }

        if(!isset($params['charset'])) {

            $params['charset'] = 'utf8';

        }

        if(!isset($params['password'])) {

            $params['password'] = '';

        }

        ob_start();

        $this->conn = new \mysqli($params['host'], $params['username'], $params['password'], $params['database'], $params['port']);

        $conn_error = ob_get_clean();

        if(strlen($conn_error) > 1 || $this->conn->connect_error) {

            $database = $params['database'];

            error("MySQLi Failed to connect to database [ $database ]. Please check your credentials.");

        } else {

            $charset = $params['charset'];

            if(!$this->conn->set_charset ($params['charset'])) {

                error("Failed to set MySQLi Charset [ $charset ]");

            }

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

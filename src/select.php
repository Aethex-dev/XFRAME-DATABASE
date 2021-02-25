<?php

namespace xframe\Database;

trait Select {

    /** 
     * select query function
     * 
     * @param object, connection object for database
     * 
    */

    function select($param) {

        var_dump($params);

        // build query
        $this->query = "SELECT {[column]} FROM {[table]} {[where]};";

        return $this;

    }

}
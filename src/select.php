<?php

namespace xframe\Database;

trait Select {

    /** 
     * select query function
     * 
    */

    function select() {

        $this->clean();

        $this->query_type = "SELECT";
        return $this;

    }

}
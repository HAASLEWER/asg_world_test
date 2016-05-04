<?php
/*
Class db
Provides the necessary methods to connect to and interact with the Contact Manager App database
*/

// Get the database configuration
require_once 'config/db_config.php';

class db {
    protected $db_name = DB_DATABASE;
    protected $db_user = DB_USERNAME;
    protected $db_pass = DB_PASSWORD;
    protected $db_host = DB_HOST;
 
    // Connect to the mysql database
    public function connect() {
        $connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
        mysql_select_db($this->db_name);
 
        return true;
    }

    // Inserts a new row into the database
    // Accepts a key value array key value array where the key represents column names and values the data to insert
    // Accepts parameter table which is the name of the table to insert into
    public function insert($data, $table) {
        $columns = "";
        $values = "";
 
        foreach ($data as $column => $value) {
            // Determine if we need to comma seperate
            $columns .= ($columns == "") ? "" : ", ";
            $columns .= $column;
            $values .= ($values == "") ? "" : ", ";
            $values .= $value;
        }
 
        $sql = "insert into $table ($columns) values ($values)";       
 
        mysql_query($sql) or die(mysql_error());
 
        // return the inserted contact id
        return mysql_insert_id();
    }

    // Updates a row
    // Accepts a key value array key where the key represents column names and values the data to insert
    // Accepts parameter table which is the name of the table to insert into
    // Accepts parameter where which specifies the where clause to use
    public function update($data, $table, $where) {
        foreach ($data as $column => $value) {
            $sql = "UPDATE $table SET $column = $value WHERE $where";
            mysql_query($sql) or die(mysql_error());
        }
        return true;
    }    

    // Deletes a row
    // Accepts parameter table which is the name of the table to insert into
    // Accepts parameter where which specifies the where clause to use
    public function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE $where";
        mysql_query($sql) or die(mysql_error());

        return true;
    }     
 
    // Select specific rows from the database
    // Accepts parameter table which is the name of the table to select from
    // Accepts parameter where which specifies the where clause to use
    // Returns a key value array where the keys represent the column names of the table
    public function select($table, $where) {
        $sql = "SELECT * FROM $table WHERE $where";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 1)
            return $this->processRows($result, true);
 
        return $this->processRows($result);
    }   

    // Converts mysql row set to a key value array
    // Accepts paramer row a mysql row set and returns a key value array key value array where the key represents column names
    // Accepts parameter single which returns only a single row
    public function processRows($rows, $single = false) {
        $result = array();
        while($row = mysql_fetch_assoc($rows))
        {
            array_push($result, $row);
        }
 
        if($single === true) {
            return $result[0];
        }
 
        return $result;
    }    
 
}

?>
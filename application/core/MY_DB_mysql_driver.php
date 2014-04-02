<?php
class MY_DB_mysql_driver extends CI_DB_mysql_driver
{

    final public function __construct($params)
    {
        parent::__construct($params);
    }


    /**
     * On Duplicate Key Update
     *
     * Compiles an on duplicate key update string and runs the query
     *
     * @author    Chris Miller <chrismill03@hotmail.com>
     * @since     1.6.2
     * @access    public
     * @param     string    the table to retrieve the results from
     * @param     array     an associative array of update value
     * @return    object
     */

    function insert_on_duplicate_update($table = '', $set = NULL )
    {

        if ( ! is_null($set))
        {
            $this->set($set);
        }

        if (count($this->ar_set) == 0)
        {
            if ($this->db_debug)
            {
                return $this->display_error('db_must_use_set');
            }
            return FALSE;
        }


        if ($table == '')
        {
            if ( ! isset($this->ar_from[0]))
            {
                if ($this->db_debug)
                {
                    return $this->display_error('db_must_set_table');
                }
                return FALSE;
            }

            $table = $this->ar_from[0];
        }

        $sql = $this->_duplicate_insert($this->_protect_identifiers($this->dbprefix.$table), $this->ar_set );
        $this->query($sql);

        $this->_reset_write();

        return true;//$this->query($sql);
    }

    function _duplicate_insert($table, $values)
    {
        $updatestr = array();
        $keystr    = array();
        $valstr    = array();

        foreach($values as $key => $val)
        {
            $updatestr[] = $key." = ".$val;
            $keystr[]    = $key;
            $valstr[]    = $val;
        }

        $sql  = "INSERT INTO ".$table." (".implode(', ',$keystr).") ";
        $sql .= "VALUES (".implode(', ',$valstr).") ";
        $sql .= "ON DUPLICATE KEY UPDATE ".implode(', ',$updatestr);

        return $sql;
    }



    /**
     * Insert_On_Duplicate_Update_Batch
     *
     * Compiles batch insert strings and runs the queries
     * MODIFIED to do a MySQL 'ON DUPLICATE KEY UPDATE'
     *
     * @access public
     * @param string the table to retrieve the results from
     * @param array an associative array of insert values
     * @return object
     */
    function insert_on_duplicate_update_batch($table = '', $set = NULL, $update_fields = NULL)
    {
        if (!is_null($set)) {
            $this->set_insert_batch($set);
        }

        if (count($this->ar_set) == 0) {
            if ($this->db_debug) {
                //No valid data array.  Folds in cases where keys and values did not match up
                return $this->display_error('db_must_use_set');
            }
            return FALSE;
        }

        if ($table == '') {
            if (!isset($this->ar_from[0])) {
                if ($this->db_debug) {
                    return $this->display_error('db_must_set_table');
                }
                return FALSE;
            }

            $table = $this->ar_from[0];
        }

        $update_fields = ($update_fields) ? $update_fields : $this->ar_keys;

        // Batch this baby
        for ($i = 0, $total = count($this->ar_set); $i < $total; $i = $i + 100) {

            $sql = $this->_insert_on_duplicate_update_batch($this->_protect_identifiers($table, TRUE, NULL, FALSE), $this->ar_keys, array_slice($this->ar_set, $i, 100), $update_fields);

            // echo $sql;

            $this->query($sql);
        }

        $this->_reset_write();

        return TRUE;
    }

    /**
     * Insert_on_duplicate_update_batch statement
     *
     * Generates a platform-specific insert string from the supplied data
     * MODIFIED to include ON DUPLICATE UPDATE
     *
     * @access public
     * @param string the table name
     * @param array the insert keys
     * @param array the insert values
     * @return string
     */
    private function _insert_on_duplicate_update_batch($table, $keys, $values, $update_fields)
    {
        foreach ($update_fields as $update_field)
            $update_fields_arr[] = $update_field . '=VALUES(' . $update_field . ')';

        return "INSERT INTO " . $table . " (" . implode(', ', $keys) . ") VALUES " . implode(', ', $values) . " ON DUPLICATE KEY UPDATE " . implode(', ', $update_fields_arr);
    }


    public function insert_ignore_batch($table = '', $set = NULL)
    {
        if (!is_null($set)) {
            $this->set_insert_batch($set);
        }

        if (count($this->ar_set) == 0) {
            if ($this->db_debug) {
                //No valid data array.  Folds in cases where keys and values did not match up
                return $this->display_error('db_must_use_set');
            }
            return FALSE;
        }

        if ($table == '') {
            if (!isset($this->ar_from[0])) {
                if ($this->db_debug) {
                    return $this->display_error('db_must_set_table');
                }
                return FALSE;
            }

            $table = $this->ar_from[0];
        }

        // Batch this baby
        for ($i = 0, $total = count($this->ar_set); $i < $total; $i = $i + 100) {

            $sql = $this->_insert_ignore_batch($this->_protect_identifiers($table, TRUE, NULL, FALSE), $this->ar_keys, array_slice($this->ar_set, $i, 100));

            //echo $sql;

            $this->query($sql);
        }

        $this->_reset_write();


        return TRUE;
    }


    function _insert_ignore_batch($table, $keys, $values)
    {
        return "INSERT IGNORE INTO " . $table . " (" . implode(', ', $keys) . ") VALUES " . implode(', ', $values);
    }


}

?>
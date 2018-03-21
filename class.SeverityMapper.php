<?php

include_once("./class.DBMySQL.php");

class SeverityMapper
{
    private $prefix = "mantis_";
    private $suffix = "_table";

    /**
     * Replaces the predefined prefix value with the own prefix from config_inc.php
     *
     * @param string $g_db_table_prefix
     */
    public function setTablePrefix($g_db_table_prefix)
    {
        $this->prefix = trim($g_db_table_prefix, " _");
        if ($this->prefix != "")
        {
            $this->prefix = $this->prefix . "_";
        }
        echo "Replaced prefix from config_inc.php\n";
    }

    /**
     * Replaces the predefined suffix value with the own prefix from config_inc.php
     *
     * @param string $g_db_table_suffix
     */
    public function setTableSuffix($g_db_table_suffix)
    {
        $this->suffix = trim($g_db_table_suffix, " _");
        if ($this->suffix != "")
        {
            $this->suffix = "_" . $this->suffix;
        }
        echo "Replaced suffix from config_inc.php\n";
    }

    /**
     * Maps records with old severity options to the new severities
     *
     * @param $g_hostname
     * @param $g_db_username
     * @param $g_db_password
     * @param $g_database_name
     */
    function mapSeverities($g_hostname, $g_db_username, $g_db_password, $g_database_name)
    {
        $db = new DBMySQL($g_hostname, $g_db_username, $g_db_password, $g_database_name);
        $db->connectDB();
        $conn = $db->getConn();

        $sql_trivial_text_tweak = "UPDATE " . $this->prefix . "bug" . $this->suffix . " SET severity = 35 WHERE severity IN (20, 30, 40)";

        if ($conn->query($sql_trivial_text_tweak)) {
            echo "Mapping to 'Unschönheit oder Text' was successful\n";
        } else {
            echo "Error updating records to 'Unschönheit oder Text': " . mysqli_error($conn) . "\n";
        }

        $sql_crash_block = "UPDATE " . $this->prefix . "bug" . $this->suffix . " SET severity = 75 WHERE severity IN (70, 80)";

        if ($conn->query($sql_crash_block)) {
            echo "Mapping to 'Blocker oder Absturz' was successful\n";
        } else {
            echo "Error updating records to 'Blocker oder Absturz': " . mysqli_error($conn) . "\n";
        }
        $db->closeDB();
    }
}

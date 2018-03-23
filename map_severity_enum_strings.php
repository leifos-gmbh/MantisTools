<?php

include_once("./config_inc.php");
include_once("./class.DBMySQL.php");
include_once("./class.SeverityMapper.php");

$db = new DBMySQL($g_hostname, $g_db_username, $g_db_password, $g_database_name);
$db->connectDB();
$conn = $db->getConn();
$mapper = new SeverityMapper($conn);;

if (isset($g_db_table_prefix))
{
    $mapper->setTablePrefix($g_db_table_prefix);
}
else
{
    echo "No prefix found in config_inc.php. Use predefined value instead.\n";
}

if (isset($g_db_table_suffix))
{
    $mapper->setTableSuffix($g_db_table_suffix);
}
else
{
    echo "No suffix found in config_inc.php. Use predefined value instead.\n";
}

$mapper->mapSeverities();
$db->closeDB();

?>

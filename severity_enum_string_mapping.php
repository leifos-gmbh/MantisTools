<?php

include("./config_inc.php");

// Create and check connection
$conn = mysqli_connect($g_hostname, $g_db_username, $g_db_password, $g_database_name);
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_trivial_text_tweak = "UPDATE mantis_bug_table SET severity = 35 WHERE severity IN (20, 30, 40)";

if (mysqli_query($conn, $sql_trivial_text_tweak)) {
    echo "First record updated successfully\n";
} else {
    echo "Error updating first record: " . mysqli_error($conn) . "\n";
}

$sql_crash_block = "UPDATE mantis_bug_table SET severity = 75 WHERE severity IN (70, 80)";

if (mysqli_query($conn, $sql_crash_block)) {
    echo "Second record updated successfully\n";
} else {
    echo "Error updating second record: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);

?>
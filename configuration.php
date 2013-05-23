<?php
define('DATABASE_HOST', 'localhost');
define('DATABASE_USER', 'todo');
define('DATABASE_PASS', 'password');
define('DATABASE_DB', 'todo');
$con = mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS);
if(!$con)
{
    die("Could not connect to database server at " . DATABASE_HOST);
}
$sel = mysql_select_db(DATABASE_DB, $con);
if(!$con)
{
    die("Could not select database " . DATABASE_DB);
}
?>

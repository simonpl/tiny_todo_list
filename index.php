<?php
session_start();
require('configuration.php');
if(isset($_GET['action']))
{
    if($_GET['action'] == "insert")
    {
        $name = mysql_real_escape_string($_POST['name'], $con);
        $prio = mysql_real_escape_string($_POST['prio'], $con);
        $query = 'INSERT INTO todo (name, prio, done) VALUES ("'.$name.'", '.$prio.', 0)';
        $queryerg = mysql_query($query, $con);
        if($queryerg)
        {
            $_SESSION['message'] = '<span class="good">Saved entry</span><br><br>';
        }
        else
        {
            $_SESSION['message'] = '<span class="bad">Could not save entry</span><br><br>';
        }
        header("Location: index.php");
        die();
    }
    else if($_GET['action'] == "delete")
    {
        $id = mysql_real_escape_string($_GET['id'], $con);
        $query = 'DELETE FROM todo WHERE id = '.$id;
        $queryerg = mysql_query($query, $con);
        if($queryerg)
        {
            $_SESSION['message'] = '<span class="good">Deleted entry</span><br><br>';
        }
        else
        {
            $_SESSION['message'] = '<span class="bad">Could not delete entry</span><br><br>';
        }
        header("Location: index.php");
        die();
    }
    else if($_GET['action'] == "done")
    {
        $id = mysql_real_escape_string($_GET['id'], $con);
        $query = 'UPDATE todo SET done = 1 WHERE id = '.$id;
        $queryerg = mysql_query($query, $con);
        if($queryerg)
        {
            $_SESSION['message'] = '<span class="good">Marked entry as done</span><br><br>';
        }
        else
        {
            $_SESSION['message'] = '<span class="muell">Could not mark entry as done</span><br><br>';
        }
        header("Location: index.php");
        die();
    }
    else if($_GET['action'] == "up")
    {
        $id = mysql_real_escape_string($_GET['id'], $con);
        $query = 'UPDATE todo SET prio = prio + 1 WHERE id = '.$id;
        $queryerg = mysql_query($query, $con);
        if($queryerg)
        {
            $_SESSION['message'] = '<span class="good">Raised priority</span><br><br>';
        }
        else
        {
            $_SESSION['message'] = '<span class="bad">Error</span><br><br>';
        }
        header("Location: index.php");
        die();
    }
    else if($_GET['action'] == "down")
    {
        $id = mysql_real_escape_string($_GET['id'], $con);
        $query = 'UPDATE todo SET prio = prio - 1 WHERE id = '.$id;
        $queryerg = mysql_query($query, $con);
        if($queryerg)
        {
            $_SESSION['message'] = '<span class="good">Reduced priority</span><br><br>';
        }
        else
        {
            $_SESSION['message'] = '<span class="muell">Error</span><br><br>';
        }
        header("Location: index.php");
        die();
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Todo-List</title>
<style type="text/css">
body {text-align:center; margin:20px}
span.good{color:green; font-weight:bold}
span.bad{color:red; font-weoght:bold}
td {border-width:1px; border-style:solid}
</style>
</head>
<body>
<?php
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<table style="border-width:1px; border-style:solid; border-collapse:collapse">
<tr>
<td><b>Name/Description</b></td>
<td><b>Priority</b></td>
<td><b>Reduce priority</b></td>
<td><b>Raise priority</b></td>
<td><b>Mark as done</b></td>
<td><b>Delete</b></td>
</tr>
<?php
$query = "SELECT * FROM todo WHERE done = 0 ORDER BY id ASC";
$queryerg = mysql_query($query, $con);
while($erg = mysql_fetch_assoc($queryerg))
{
    echo '<tr><td>'.$erg['name'].'</td><td>';
    switch($erg['prio'])
    {
        case 0:
            echo 'Low</td><td></td><td><a style="text-decoration:none" href="index.php?action=up&id='.$erg['id'].'">^</a>';
            break;
        case 1:
            echo 'Normal</td><td><a style="text-decoration:none" href="index.php?action=down&id='.$erg['id'].'">v</a></td><td><a style="text-decoration:none" href="index.php?action=up&id='.$erg['id'].'">^</a>';
            break;
        case 2:
            echo 'High</td><td><a style="text-decoration:none" href="index.php?action=down&id='.$erg['id'].'">v</a></td><td>';
            break;
    }
    echo '</td><td><a href="index.php?action=done&id='.$erg['id'].'">Done</a></td><td><a href="index.php?action=delete&id='.$erg['id'].'">x</a></td></tr>';
}
?>
</table>
<br><br>
<b>New entry</b>
<form action="index.php?action=insert" method="POST">
<textarea name="name" rows="5" cols="60"></textarea><br><br>
<b>Priority:</b>  <select name="prio"><option value="0">Low</option><option value="1">Normal</option><option value="2">High</option></select><br><br>
<input type="submit" value="Eintragen">
</form>


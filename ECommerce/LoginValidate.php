<?php
session_start();
require_once 'DataBaseConnection.php';
unset ($_SESSION['badPass']);
$date = date("format", $timestamp);
$_SESSION['LoginDate']= $date;

$myUsername = $_POST['myUsername'];
$myPassword = $_POST['myPassword'];

$myUsername = stripslashes($myUsername);
$myPassword = stripslashes($myPassword);
$myUsername = mysql_fix_string($con, $myUsername);
$myPassword = mysql_fix_string($con, $myPassword);
$Hash = hash("ripemd128", $myPassword);

$sql = "SELECT * FROM Library.Friends WHERE username='"
    . $myUsername . "' and password='" . hash("ripemd128",$_POST['myPassword']) . "'";
$result = $con->query($sql);

if (!result)
{
    $message = "Whole Query" . $sql;
    echo $message;
    die('Invalid query' . mysqli_error());
}

$count = $result->num_rows;

if ($count == 1)
{
     $_SESSION['user'] = $myUsername;
    $_SESSION['password'] = $myPassword;
    
     header("Location:Catalogue.php");
}
    else {
        header("Location:Login.php");
        $_SESSION['badPass']=1;
    }
    mysqli_close($con);
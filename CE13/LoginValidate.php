<?php
session_start();
require_once 'DataBaseConnection.php';
unset ($_SESSION['badPass']);

$myUsername = $_POST['myUsername'];
$myPassword = $_POST['myPassword'];

$myUsername = mysql_fix_string($con, $myUsername);
$myPassword = mysql_fix_string($con, $myPassword);

$Hash = hash("ripemd128", $myPassword);

$sql = "SELECT * FROM Library.Friends WHERE username='"
    . $myUsername . "' and password='" . $myPassword . "'";
$result = $con->query($sql);

if (!result)
{
    $message = "Whole Query" . $sql;
    echo $message;
    echo "Username and password incorrect.";
    die('Invalid query' . mysqli_error());
}
$count = $result->num_rows;

if ($count == 1)
{
    $_SESSION['user'] = $myUsername;
    $_SESSION['password'] = $myPassword;
    
    header("Location:LoginResult.php");
}
    else {
        header("Location:Login.php");
        $_SESSION['badPass']=1;
        echo "Username and password incorrect.";
    }

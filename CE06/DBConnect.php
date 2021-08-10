<?php

$host="127.0.0.1";
$user="root";
$password="dbadmin";
$dbname="Library";

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error($con));
if($con->connect_error==FALSE){
    echo"<h2>We connected</h2><br>";
}
else
{
    echo $con->connect_error;
}

//$con->close();

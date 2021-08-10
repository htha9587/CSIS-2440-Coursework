<!doctype html>

<?php
//Parameterizes the post variables.
$name = htmlentities($_POST['Name']);
$age = $_POST['Age'];
$address = $_POST['Address'];
$state = $_POST['State'];
$sex = $_POST['sex'];

//Reads from poem text file.
$file = explode("\n", file_get_contents("PostPage.txt"));

//Gets number of years the user has lived.
$currentYear = date(Y);
$birthYear = $currentYear - $age - 1;
$yearsNumber = array();
while ($birthYear != $currentYear) 
 {
    $yearsNumber[] = $birthYear;
    $birthYear++;
 }
 
//Inserts current year into yearNumber array.
$yearsNumber[] = $currentYear;

//Changes background color for the page based on gender.
if ($sex == "Male") 
    {
    echo '<body style="background-color: #77c">';
    } 
    else 
    {
    echo '<body style="background-color: #f759ff">';
    }
    
?>

<html>
    <head>
        <title>Who You Are</title>
        <meta charset="UTF-8">
        <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAA19fXAMCAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIBAQECAgICAgICAQEBAgICAQABAgICAgICAgEAAQICAgEAAQECAgECAgEBAAEBAgIBAAAAAQEAAQEAAQAAAAEBAQABAQABAAEBAAEAAQEAAQEAAQEAAQABAQABAAEBAAEBAAEBAAEAAQEAAQABAQABAQAAAAEBAAAAAQEAAAABAQIBAQECAQABAQICAQEBAgICAgICAgEAAQICAgICAgICAgICAgIBAQECAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon" />
        <style>
            h2{
                font-family: Verdana, sans-serif;
                text-decoration: underline;
                font-weight: bold;
            }
            body {
                font-family: Verdana, sans-serif;
                padding: 3px;
            }
        </style>
    </head>
    
    <?php
    //Printf function displays submitted information by the user.
    printf("<h2 class='text-center'>Who You Are</h2>");
      printf ("<div class='container' style='font-size:18px;'>");
        printf(" <p>Your Name is: <b>%s</b></p>", $name);
         printf("<p>Your Age is: <b>%d</b></p>", $age);
         printf("<p>Your Address is: <b>%s</b></p>", $address);
         printf("<p>Your State is: <b>%s</b></p>", $state);
        printf(" <p>Your Sex is: <b>%s</b></p>", $sex);
      echo( "</div>");
    ?>
    
    <br>
    <div class="container">
        <h5>Years Lived</h5>
        <?php
        //Displays years lived.
            echo implode(", ", $yearsNumber);
        ?>
    </div>
    <br>
    <div class='container'>
        <?php
        //Prints out the poem file contents.
        echo implode("\n", $file);
        ?>
    </div>
</body>        
</html>


<?php
require_once ('DataBaseConnection.php');
?>
<html>
    <head>
        <title>Family Result</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAC9qnMA9ubeAObKrAD///8A7s60AO7WvQDNupQA1bJ7AMWqcwD/8v8A//r2AM2qcwDevpwAtJ1aAN7StAC9oWIA//b2AN7CiwD27uYAtJlaAMWhYgCkhTEAzbqLAP/y7gD24s0A5trFAP/6/wD26t4AzaFiAN7KrADNtoMA/+7uAM2ycwD23s0A1cKcAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMiHQMDAwMDAwMDAwMDAwMNBQMDAwMDAwMDGgkDAwMaHRwCAwMDAwMPGCIDAwMDAw4RGgMDAwMEAhUDAwMDARMhAwMDAwMDEQoCAwMDAw8aAwMDAwMDAyIDAwMDAx8eAwMDAwMDAwMYGQMDAwMgEgMDAwMDAwMDBwMDAwMBAAMDAwMDAwMDEgIaAwMKDQMDAwMDAwMDAwwJBQMhExoDAwMDAwMDAxsiFxYUBgMDAwMDAwMDAwMECAsQAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon" />
    </head>
    <body>  
        <?php
        $fName = htmlentities($_POST['fName']);
        $lName = htmlentities($_POST['lName']);
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $year = $_POST['year'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sex = $_POST['sex'];
        $relation = $_POST['relation'];
        $request = $_POST['requestType'];
        $Hash = hash("ripemd128", $password);
        
        switch ($request) {
            case "Search":
                $search = "SELECT * FROM Library.Friends where fName = '$fName' and lName = '$lName'";
                $return = $con->query($search);
if (!$return)
{
    $message = "Whole Query " . $search;
    echo $message;
    die('Invalid query: ' . mysqli_error($con));
}
                if (!$return) {
                    echo 'The info you requested could not be displayed. Please try again at a later time.';
                } else
                if (mysqli_num_rows($return) == 0) {
                    echo '<tr><td>No Contact found.</td></tr></tbody></table>';
                } else {
                    while ($row = $return->fetch_assoc()) {
                        print <<< HTML
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                 </tr>
            </thead>
            <tbody>
HTML;
                        echo '<tr>'
                        . '<td>' . $row['fName'] . '</td>'
                        . '<td>' . $row['lName'] . '</td>'
                        . '<td>' . $row['phone'] . '</td>'
                        . '<td>' . $row['address'] . '</td>'
                        . '<td>' . $row['city'] . '</td>'
                        . '<td>' . $row['state'] . '</td>'
                        . '<td>' . $row['zip'] . '</td>'
                        . '</tr></tbody></table>';
                    }
                }
                break;
            case "Create":
                $create = "INSERT INTO Library.Friends (fName, lName, phone, address, city, state, zip, month, day, year, username, "
                        . "password, sex, relation) VALUES('$fName', '$lName', '$phone', '$address', '$city', '$state', '$zip', '$month', 
                            '$day', '$year', '$username', '$Hash', '$sex', '$relation')";
                
                $result2 = $con->query($create);
                if (!$result2) {
                    die($con->error);
                }
                if (!$result2) {
                    echo "User could not be created.";
                } else {
                    echo "User created!";
                }
                break;
            case "Update":
                
                if (($_POST['username'])==null) {
                    echo"<p>You forgot your username and password!</p>";
                } else {
                    
                $update = "UPDATE Library.Friends SET lname = '$lName', phone = '$phone', address = '$address', 
                            city = '$city', state = '$state', zip = '$zip'
                            WHERE username = '$username' AND password = '$password'";
                    $result3 = $con->query($update);
                    if (!$result3) {
                        die($con->error);
                    }
                    if (!$result3) {
                        echo "User could not be updated.";
                    } else {
                        echo "Successfully Updated!";
                    }
                }
                break;
            default:
                echo "Input invalid. Try Again.";
        }
        $con->close;
        ?>
        <a href="FamilyForm.php">Back</a>
    </body>
</html>


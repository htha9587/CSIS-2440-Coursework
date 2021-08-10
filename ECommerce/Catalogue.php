<?php
session_start();
require_once 'DataBaseConnection.php';

if (!isset($_SESSION['user'])) {
    header("Location: Login.php");
}

$product = $_POST['select'];
$action = $_POST['action'];

switch ($action) {
    case "Add":
        $_SESSION['cart'][$product] ++;
        break;
    case "Remove":
        $_SESSION['cart'][$product] --;
        if ($_SESSION['cart'][$product] <= 0) {
            unset($_SESSION['cart'][$product]);
        }
        break;
    case "Empty":
        unset($_SESSION['cart']);
        break;
    case "Info":
        $_SESSION['product_id'] = $product;
        break;
}
?>
<html>
    <head>
        <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAA19fXAMCAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIBAQECAgICAgICAQEBAgICAQABAgICAgICAgEAAQICAgEAAQECAgECAgEBAAEBAgIBAAAAAQEAAQEAAQAAAAEBAQABAQABAAEBAAEAAQEAAQEAAQEAAQABAQABAAEBAAEBAAEBAAEAAQEAAQABAQABAQAAAAEBAAAAAQEAAAABAQIBAQECAQABAQICAQEBAgICAgICAgEAAQICAgICAgICAgICAgIBAQECAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon" />
        <title>Shop Catalogue</title>
        <style>
            /*Styles for body of the page.*/
            body {
                font-family: Verdana, sans-serif;
                font-size: 16px;
                background-color: #444444;
                color: #cccccc;
                padding: 3px;
            }
            /*Styles for the page header.*/
            h2 {
                font-family: Verdana, sans-serif;
                border-bottom: 3px solid #cc9900;
                color: #529214;
                font-size: 30px;
            }
            
            h3 {
                font-family: Verdana, sans-serif;
                border-bottom: 3px solid #cc9900;
                color: #529214;
                font-size: 30px;
            }
            
            h4 {
                font-family: Verdana, sans-serif;
                border-bottom: 3px solid #cc9900;
                color: #529214;
                font-size: 30px;
            }
            
            input[type=submit]:hover {
                background-color: #45a049;
            }
            
             a href {
                color: #529214;
            }
        </style>
    </head>
    <body>
        <br>
        <h2>Harrison's Shop</h2>
        <h3>Please select one of our items:</h3>
        <br>
        <form method="post" action="Catalogue.php">
            <div>
                <select name="select" style="width: 50%;">
                    <option>Select an item</option>
                    <?php
                    $search = "SELECT * FROM Library.Products Order by Name";
                    $return = $con->query($search);
                    
                    if (!$return) {
                        $message = "Whole query" . $search;
                        echo $message;
                        die("invalid query" . mysqli_error());
                    }
                    
                    while ($row = mysqli_fetch_array($return)) {
                        if ($row['ProductID'] == $product) {
                            echo "<option value='" . $row['ProductID'] . "' selected='selected'>"
                            . $row['Name'] . "</option>";
                        } else {
                            echo "<option value='" . $row['ProductID'] . "'>"
                            . $row['Name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Price</td>
                        <td>Image</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM Library.Products WHERE ProductID ='" . $_SESSION['product_id'] . "'";
                    $result = $con->query($sql);
                    if (!$result) {
                        $message = "query" . $sql;
                        echo $message;
                        die("invalid" . mysqli_error($link));
                    }
                    while ($row = mysqli_fetch_array($result)) {
                        echo"<tr><td>" . $row['Name'] . "</td><td>" . $row['Description'] . "</td>"
                        . "<td>" . $row['Price'] . "</td><td>"
                        . "<img src='productImages/" . $_SESSION['product_id'] . ".jpg' width='120' height='120'>"
                        . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <h4>Your Cart</h4>
            <table>
                <thead>
                    <tr>
                        <td>Items</td>
                        <td>Quantity</td>
                        <td>Cost</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($_SESSION['cart']) {
                        foreach ($_SESSION['cart'] as $product => $quantity) {
                            $sql = "SELECT `Name`, `Description`, `Price` FROM Library.Products WHERE"
                                    . " ProductID ='" . $product . "'";
                            $result1 = $con->query($sql);
                            if (!$result1) {
                                $message = "query" . $sql;
                                echo $message;
                                die("invalid" . mysqli_error($link));
                            }
                            list($name, $desc, $price) = mysqli_fetch_row($result1);
                            $line_cost = $price * $quantity;
                            $total = $total + $line_cost;
                            echo"<tr>";
                            echo "<td>" . $name . "</td>";
                            echo "<td>" . $quantity . "</td>";
                            echo "<td>$" . $line_cost . ".00</td>";
                        }
                        echo "<td>$" . $total . ".00</td>";
                        echo"</tr>";
                    } else {
                        echo"There are no items in your cart";
                    }
                    ?>

                </tbody>
            </table>
            <table>
                <tr>
                    <td>
                        <input class="btn btn-success" type="submit" value="Add" name="action">
                    </td>
                    <td>
                        <input class="btn btn-danger" type="submit" value="Remove" name="action">
                    </td>
                    <td>
                        <input class="btn btn-primary" type="submit" value="Empty" name="action">
                    </td>
                    <td>
                        <input class="btn btn-default" type="submit" value="Info" name="action">
                    </td>
                </tr>
            </table>
        </form>
        <div>
            <a class="btn btn-warning" href="Logout.php" id="logout">Logout of cart?</a>
        </div>
    </body>
</html>
<?php
mysqli_close($con);


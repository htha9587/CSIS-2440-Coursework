<?php

session_start();
require_once 'DataBaseConnection.php';
$product_id = $_POST['Select_Product'];
$action = $_POST['action'];

switch ($action) {
    case "Add":
        $_SESSION['cart'][$product_id]++;
        break;
    case "Remove":
        $_SESSION['cart'][$product_id]--;
        if($_SESSION['cart'][$product_id]<=0){
            unset($_SESSION['cart'][$product_id]);
        }
        break;
    case "Empty":
        unset($_SESSION['cart']);
        break;
    case "Info":
        $infoNum = $product_id;
        break;
        
}
//print_r($_SESSION);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAA19fXAMCAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIBAQECAgICAgICAQEBAgICAQABAgICAgICAgEAAQICAgEAAQECAgECAgEBAAEBAgIBAAAAAQEAAQEAAQAAAAEBAQABAQABAAEBAAEAAQEAAQEAAQEAAQABAQABAAEBAAEBAAEBAAEAAQEAAQABAQABAQAAAAEBAAAAAQEAAAABAQIBAQECAQABAQICAQEBAgICAgICAgEAAQICAgICAgICAgICAgIBAQECAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon" />
        <title>Adventure Cart</title>
    </head>
    <body>
        <div class="form" id="form_container">
            <form action="CE14.php" method="Post">
                <div>

                    <p><span class="text">Please Select a product:</span>
                        <select id="Select_Product" name="Select_Product" class="select">
                            <option value=""></option>
                            <?php
                        $search = "SELECT * FROM Library.AdventureGear Order by Item";
                        $return = $con->query($search);

                        if (!$return) {
                            $message = "Whole query " . $search;
                            echo $message;
                            die("Invalid query " . $mysql_error());
                        }
                        while ($row = mysqli_fetch_array($return)){
                            if ($row['idAdventureGear'] == $product_id){
                                echo "<option value='" .$row['idAdventureGear'] . "'selected='selected'>"
                                . $row['Item'] . "</option>";
                            }else{
                                echo "<option value='" . $row['idAdventureGear'] . "'>"
                                . $row['Item'] . "</option>";
                            }
                            }
                        ?>
                        </select></p>
                    <table>
                        <tr>
                            <td>
                                <input id="button_Add" type="submit" value="Add" name="action" class="button"/>
                            </td>
                            <td>
                                <input name="action" type="submit" class="button" id="button_Remove" value="Remove"/>
                            </td>
                            <td>
                                <input name="action" type="submit" class="button" id="button_empty" value="Empty"/>
                            </td>
                            <td>
                                <input name="action" type="submit" class="button" id="button_Info" value="Info"/>
                            </td>
                        </tr>                    
                    </table>
                </div>
            </form>
        </div>
        </div>
            <div id="productInformation">

            </div>
            <div>
                <?php
                if ($infoNum > 0){
                    $sql = "SELECT Item, Cost, Weight, ItemImage FROM Library.AdventureGear Where idAdventureGear = " . $infoNum;
                    echo "<table align ='left' width='100%'><tr><th>Name</th><th>Price</th><th>Weight</th></tr>";
                    $result = mysqli_query($sql);
                    if (mysqli_num_rows($result) > 0){
                        list($infoname, $infoprice, $infoweight, $infoimage) = mysqli_fetch_row($result);
                        echo"<tr>";
                        echo"<td align=\"left\" width=\"450px\">$infoname</td>";
                        echo"<td align=\"left\" width=\"325px\">" . money_format('%(#8n', $infoprice) . " </td>";
                        echo"<td align=\"center\">$infoweight</td>";
                        echo"<td align=\"left\" width=\"450px\"><img src='images\\$infoimage' height=\"160\" width=\"160\"></td>";
                        echo "</tr>";
                    }
                    echo"</table>";
                }
                echo "You have no items in your shopping cart.";
                ?>
            </div>
        </form>
        </div>
        <div>
    <?php
    if ($_SESSION['cart']){
        echo"<table border=\"1\" padding=\"3\" width=\"650px\"><tr><th>Name</th><th>Weight</th><th>Price</th>"
        . "<th width=\"80px\">Line</th></tr>";
        foreach ($_SESSION['cart'] as $product_id => $quantity){
            $sql = "SELECT Item, Cost, Weight FROM Library.AdventureGear WHERE idAdventureGear = " . $product_id;
            $result = $con->query($sql);
            if (mysqli_num_rows($result) > 0){
                list($name, $price, $weight) = mysqli_fetch_row($result);
                $weight = $weight * $quantity;
                $line_cost = $price * $quantity;
                $totWeight = $totWeight + $weight;
                $total = $total + $line_cost;
                echo "<tr>";
                echo"<td align=\"Left\" width=\"450px\">$name</td>";
                echo"<td align=\"center\" width=\"75px\">$weight</td>";
                
                echo"<td align ='\"center\" width=\"75px\">" . money_format('%(#8n', $price) . "</td>";
                
               echo"<td align=\"center\">" . money_format('%(#8n', $line_cost) . "</td>";
                echo"</tr>";
            }
        }
    }
    ?>
        </div>
    </body>
</html>

<!DOCTYPE html>
<!--
PHP CE02.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Class Exercise 2</title>
    </head>
    <body>
        <h3>Days of the Week</h3>
        <?php
        /**
         * Harrison Thacker
         * 1-16-18
         * 20
         */
        $d=date("D");
        echo "$d<br>";
        if ($d == "Fri" or $d == "Sat" || $d == "Sun")
        {
            $message = "Have a nice weekend!";
        }
        else if ($d == "Mon")
        {
            $message = "Oh no it's Monday!";
        }
        else {
            $message = "Have a nice day!";
        }
        echo $message = "<br>";
        
        switch ($d)
        {
         case "Mon":

        echo "Today is Monday";

        break;

        case "Tue":

        echo "Today is Tuesday";

        break;

        case "Wed":

        echo "Today is Wednesday";

        break;

        case "Thu":

        echo "Today is Thursday";

        break;

        case "Fri":

        echo "Today is Friday";

        break;

        case "Sat":

        echo "Today is Saturday";

        break;

        case "Sun":

        echo "Today is Sunday";

        break;

        default:

        echo "Wonder which day is this ?";
        }
        
        
        $a = 5;
        $b = 5;
        print('<table width=\'50px\' class="table"><tr><th>$a</th><th>$b</th></tr>');
        for ($i; $i <5; $i++)
         {
            $a += 10;
            $b += 5;
            print("<tr><td>$a</td><td>$b</td></tr>");
         }
         
         echo ("</table><br>At the end of the loop a=$a and b=$b and i = $i");
         
         $i = rand(0,50);
         $num = rand(51,100);
         
         do {
             $num--;
             
             $i++;
         }    while ($i < $num);
         {
             echo ("<br>Loop stopped at i =$i and num = $num" );
             
             echo ("br>Year of Birth:<select>");
             $year1 = date("Y");
             for ($y = 0; $y < 100; $y++)
             {
                 if ($y > 10)
                 {
                     $yearval = $year1 - $y;
                     echo "<option>$yearval</option>\n";
                 }
             }
         }
         echo "</select>";
?>
    </body>
</html>


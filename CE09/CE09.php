<?php
?>

<html>   
   <head>
      <title>Form Validation</title>
      <script type="text/javascript" src="myjs.js"></script>     
   </head>   
   <body>
      <form action="" name="myForm" onsubmit="return(validate());">
         <table cellspacing="2" cellpadding="2" border="1">            
            <tr>
               <td align="right">Name</td>
               <td><input type="text" name="Name" /></td>
            </tr>            
            <tr>
               <td align="right">EMail</td>
               <td><input type="text" name="EMail" /></td>
            </tr>            
            <tr>
               <td align="right">Zip Code</td>
               <td><input type="text" name="Zip" /></td>
            </tr>            
            <tr>
               <td align="right">Country</td>
               <td>
                  <select name="Country">
                     <option value="-1" selected>[choose yours]</option>
                     <option value="1">USA</option>
                     <option value="2">UK</option>
                     <option value="3">INDIA</option>
                  </select>
               </td>
            </tr>            
            <tr>
               <td align="right"></td>
               <td><input type="submit" value="Submit" /></td>
            </tr>            
         </table>
      </form>      
   </body>
</html>



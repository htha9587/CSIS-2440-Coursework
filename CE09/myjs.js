
//Function evaluation code.
function validate()
{
   if( document.myForm.Name.value == "" )     
        {
            alert("Please provide your name!");
            document.myForm.Name.focus();
            return false;
        }
        
        if( document.myForm.Zip.value == "" || 
                isNaN( document.myForm.Zip.value ) ||
                document.myForm.Zip.value.length != 5 )
        {
            alert("Please provide a zip in the format #####.");
            document.myForm.Zip.focus();
            return false;
        }
        
        if( document.myForm.Country.value == "-1" )     
        {
            alert( "Please provide your country!" );
            return false;
            //errorArray.push("You need a country")
        }
        
        expression = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        console.log(expression.test(document.myForm.EMail.value))
        if( !expression.test(document.myForm.EMail.value))     
        {
            alert("Wrong format for email!");
            document.myForm.EMail.focus();
            //errorArray.push("You need the right format for email!")
            return false;
        }
        
        if (errorArray.length > 0)
        {
            var errorReport = document.getElementById("errorlog");
            errorString = "<ul>"
            for (i= 0; i < errorArray.length; i++)
            {
                errorString = errorString + "<li>" + errorArray[i] + "</li>"
            }
            errorString = errorString + "</ul>"
            errorReport.innerHTML = errorString
            return false;
        }
        
        if (!document.myForm.EMail.value.match(expression))
        {
            alert("Enter a valid email! Format: john.doe@mail.com");
            document.myForm.EMail.focus();
            return false;
        }
        return( true );
                
}

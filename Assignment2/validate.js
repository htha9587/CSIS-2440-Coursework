function searchValidate()
{
    //First name.
    if(document.form.fName.value == "" )
    {
        alert("Please provide your first name!");
        document.form.fName.focus() ;
            return false;
    }
        
    if(!/^[a-zA-Z]+$/.test(document.form.fName.value))
    {
        alert("Letters only!");
        document.form.fName.focus();
            return false;
    }
    
    //Last Name.
    if(document.form.lName.value =="")
    {
        alert("Please provide your last name!");
                document.form.lName.focus();
                return false;
    }
    
    if(!/^[a-zA-Z]+$/.test(document.form.lName.value))
    {
        alert("Letters only!");
        document.form.lName.focus();
            return false;
    }
    return (true);
}

function validate()
{
    
    searchValidate();
     
    
    //Address.
    if(document.form.address.value == "")
    {
        alert("Please Provide an address!");
        document.form.address.focus();
        return false;
    }
    
    //City.
    if(document.form.city.value == "")
    {
        alert("Select a city!");
        document.form.city.focus();
        return false;
    }
    
    //State.
    if(document.form.state.value == "state")
    {
        alert("Select a state!");
        document.form.state.focus();
        return false;
    }
    
    //Zip.
    if(document.form.zip.value == "")
    {
        alert("Provide a zip-code please!");
        document.form.zip.focus();
        return false;
    }
    
    //Phone number.
    if(document.form.phone.value == "")
    {
        alert("Provide a phone number");
        document.form.phone.focus();
        return false;
    }
    
    if(!/^[0-9]+$/.test(document.form.phone.value))
    {
        alert("Numbers only!");
        document.form.phone.focus();
        return false;
    }
    
    //Birthday.
    if(document.form.month.value == "month" || document.form.day.value == "day"||document.form.year.value=="year")
    {
        alert("Select a birthday please!");
        document.form.month.focus();
        return false;
    }
    
    //Username.
    if(document.form.username.value == "")
    {
        alert("Username please!");
        document.form.username.focus();
        return false;
    }
    
    //Password.
    if(document.form.password.value == "")
    {
        alert("Password please!");
        document.form.password.focus();
        return false;
    }
    
    //Sex.
    if(document.form.sex.value == "sex")
    {
        alert("Select a sex please!");
        document.form.sex.focus();
        return false;
    }
    
    //Relation.
    if(document.form.relation.value == "relation")
    {
        alert("What's your relationship!");
        document.form.relation.focus();
        return false;
    }
    return (true);
}
function checkPass()
{
    var badColor = "#ff6666";

    var email = document.getElementById("email").value;
    var confirmEmail = document.getElementById("confirmEmail");
    var indx = email.indexOf('@');
    if ( indx > 1 ) {

    }
    else {
        confirmEmail.style.color = badColor;
        confirmEmail.innerHTML = "Invalid Email";
        return false;
    }

    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('confirmpassword');
    var messagepass = document.getElementById('confirmMessage');


    if(pass1.value == pass2.value){
        return true;
    }else{
        messagepass.style.color = badColor;
        messagepass.innerHTML = "Passwords Do Not Match!"
        return false;
    }
}
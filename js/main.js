const signup = document.getElementById("btn-signup");

signup.addEventListener("click", () => {
    let email = document.getElementById("email");
    let pass = document.getElementById("pass");
    let cpass = document.getElementById("cpass");
    let name = document.getElementById("name");
    if (email.value == "") {
        document.getElementById("email_error").innerHTML = "Email cannot be null";
        return;
    }
    else {
        document.getElementById("email_error").innerHTML = "";
    }

    if (name.value == "") {
        document.getElementById("name_error").innerHTML = "This field cannot be null";
        return;
    }
    else
        document.getElementById("pass_error").innerHTML = "";

    if (pass.value == "") {
        document.getElementById("pass_error").innerHTML = "This field cannot be null";
        return;
    }
    else
        document.getElementById("pass_error").innerHTML = "";

    if (cpass.value == "") {
        document.getElementById("cpass_error").innerHTML = "This field cannot be null";
        return;
    }
    else
        document.getElementById("cpass_error").innerHTML = "";

    if (pass.value != cpass.value) {
        document.getElementById("form_error").innerHTML = "Passwords do not match";
    }
    else {
        document.getElementById("form_error").innerHTML = "";
    }
    signup.type = "submit";

});
function signIn() {
    var username = document.getElementById("username2");
    var password = document.getElementById("password2");

    var formData = new FormData();
    formData.append("username", username.value);
    formData.append("password", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "adminpanel.php";

                // swal("Done!", "We will contact you as soon", "success");

            } else {
                swal("Alert!", t, "error");
            }
        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(formData);
}
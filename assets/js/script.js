function signUp() {

    var fn = document.getElementById("fn");
    var ln = document.getElementById("ln");
    var e = document.getElementById("e");
    var m = document.getElementById("m");
    var p = document.getElementById("p");
    var cn = document.getElementById("cp");

    var form = new FormData();
    form.append("fn", fn.value);
    form.append("ln", ln.value);
    form.append("e", e.value);
    form.append("m", m.value);
    form.append("p", p.value);
    form.append("cp", cp.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Register Successful") {
                window.location = "login-register.php";
            } else {
                swal("Alert!", text, "error");
            }
        }
    }

    r.open("POST", "signupprocess.php", true);
    r.send(form);

}

function signIn() {

    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var rm = document.getElementById("remember_me").checked;

    var form = new FormData();
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("rm", rm);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "1") {
                swal("Done!", "Sign In successful", "success");
                window.location = "index.php";
            } else {
                swal("Alert!", text, "error");
            }

        }
    }

    r.open("POST", "signinprocess.php", true);
    r.send(form);

}


function verifyUser() {

    var e = document.getElementById("rec_Email");
    var b = document.getElementById("sendCodeButton");
    var i = document.getElementById("loader");


    var f = new FormData();
    f.append("e", e.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState != 4) {

            b.className = "d-none";
            i.className = "d-block";

        }

        if (r.readyState == 4) {

            b.className = "d-block hiraola-login_btn";
            i.className = "d-none";

            var text = r.responseText;
            if (text == "1") {
                document.getElementById("b1").classList = "d-none";
                document.getElementById("b2").classList = "d-block";
                document.getElementById("b3").classList = "d-none";
                document.getElementById("step2").classList = "text-danger";
                document.getElementById("step2").style.height = "5px";
                document.getElementById("displayError1").innerHTML = "*Please check your inbox for the verification code";
            } else {
                document.getElementById("displayError").innerHTML = "*" + text;
            }
        }

    }

    r.open("POST", "verifyUser.php", true);
    r.send(f);

}

function checkVerificationCode() {

    var vc = document.getElementById("vc");
    var b = document.getElementById("vcb");
    var i = document.getElementById("loader1");

    var f = new FormData();
    f.append("vc", vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState != 4) {

            b.className = "d-none";
            i.className = "d-block";

        }

        if (r.readyState == 4) {

            b.className = "d-block hiraola-login_btn";
            i.className = "d-none";

            var text = r.responseText;
            if (text == "1") {
                document.getElementById("b1").classList = "d-none";
                document.getElementById("b2").classList = "d-none";
                document.getElementById("b3").classList = "d-block";
                document.getElementById("step3").classList = "text-danger";
                document.getElementById("step3").style.height = "5px";
            } else {
                document.getElementById("displayError2").innerHTML = "*" + text;
            }

        }

    }

    r.open("POST", "checkVC.php", true);
    r.send(f);

}

function resetPassword() {

    var np = document.getElementById("np");
    var b = document.getElementById("rpb");
    var i = document.getElementById("loader2");

    var f = new FormData();
    f.append("np", np.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState != 4) {

            b.className = "d-none";
            i.className = "d-block";

        }

        if (r.readyState == 4) {

            b.className = "d-block hiraola-login_btn";
            i.className = "d-none";

            var text = r.responseText;
            if (text == "1") {

                document.getElementById("rec_Email").value = "";
                document.getElementById("vc").value = "";
                document.getElementById("np").value = "";

                document.getElementById("displayError").innerHTML = "";
                document.getElementById("displayError1").innerHTML = "";
                document.getElementById("displayError2").innerHTML = "";
                document.getElementById("displayError3").innerHTML = "";

                document.getElementById("step4").classList = "text-danger";
                document.getElementById("step4").style.height = "5px";

                document.getElementById("b3").classList = "d-none";
                document.getElementById("b4").classList = "d-block";
            } else {
                document.getElementById("displayError3").innerHTML = "*" + text;
            }

        }

    }

    r.open("POST", "resetpassword.php", true);
    r.send(f);

}

function changeBox() {

    var b1 = document.getElementById("signInBox");
    var b2 = document.getElementById("signUpBox");
    var button = document.getElementById("changeB");
    var b3 = document.getElementById("vBox");
    var t = button.innerHTML;

    b3.classList = "col-6 mt-5 pt-5 mb-5 rb";

    if (t == "Go to Sign In") {
        b1.classList = "d-block col-12 col-lg-6 rb";
        b2.classList = "d-none";
        button.innerHTML = "Create a new account";
    } else {
        b1.classList = "d-none";
        b2.classList = "d-block col-12 col-lg-6 rb";
        button.innerHTML = "Go to Sign In";
    }



}
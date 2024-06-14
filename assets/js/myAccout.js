function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "index.php";
            }

        }
    };

    r.open("GET", "signout.php", true);
    r.send();

}

function updateprofileimg() {
    var image = document.getElementById("profileimg"); //file chooser
    var view = document.getElementById("prevf"); //image tag

    image.onchange = function() {
        var file = this.files[0]; //image eka thiyana file path eka
        var url = window.URL.createObjectURL(file); //file location eka tempary url ekak lesa sakasima

        view.src = url; //img tag eke src ekata url eka laba dima
    }
}


function updateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var country = document.getElementById("country");
    var img = document.getElementById("profileimg");
    var pc = document.getElementById("pc");

    var f = new FormData();

    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("a1", line1.value);
    f.append("a2", line2.value);
    f.append("c", country.value);
    f.append("pc", pc.value);
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Update SuccessFully") {
                location.reload()
                swal("Done!", "Update Successfully", "success");

            } else {
                swal("Alert!", t, "error");
            }


            //  alert(t);
            // window.location = "userprofile.php";
        }
    }

    r.open("POST", "UpdateProfileProcess.php", true);
    r.send(f);


}
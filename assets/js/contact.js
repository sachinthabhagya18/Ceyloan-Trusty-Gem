function send() {
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var subject = document.getElementById("subject");
    var msg = document.getElementById("msg");

    var f = new FormData();
    f.append("name", name.value);
    f.append("email", email.value);
    f.append("subject", subject.value);
    f.append("msg", msg.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {

                name.value = "";
                email.value = "";
                subject.value = "";
                subject.value = "";
                swal("Done!", "Contact added successfully", "success");

                changeView();

            } else {
                swal("Alert!", text, "error");

            }
        }
    };

    r.open("POST", "contactmsgProcess.php", true);
    r.send(f);
}

function subcribe() {

    var email = document.getElementById("email");

    var f = new FormData();
    f.append("email", email.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                email.value = "";
                swal("Done!", "Subscribed successfully", "success");
            } else {
                swal("Alert!", text, "error");
            }
        }
    };

    r.open("POST", "subcribeProcess.php", true);
    r.send(f);

}
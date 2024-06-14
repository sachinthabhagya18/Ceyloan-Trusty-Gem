function blockcustomer(id) {
    var id = id;
    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                window.location = "manageCustomer.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock"
            } else if (t == "success2") {
                window.location = "manageCustomer.php";
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block"
            }
        }
    }

    r.open("POST", "customerBlockProcess.php", true);
    r.send(f);
}

function singleviewmodal(id) {
    var pop = document.getElementById("singleproductview" + id);

    k = new bootstrap.Modal(pop);
    k.show();
}
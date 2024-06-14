function addCategory() {
    var c = document.getElementById("c");

    var form = new FormData();
    form.append("c", c.value);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Product added successfully") {
                swal("Done!", "Category added successfully", "success");
                window.location = "adminpanel.php";
            } else {
                swal("Alert!", text, "error");
            }
        }
    }

    r.open("POST", "addCategoryProces.php", true);
    r.send(form);
}

function addColor() {
    var co = document.getElementById("co");

    var form = new FormData();
    form.append("co", co.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Product added successfully") {
                swal("Done!", "Color added successfully", "success");
                window.location = "adminpanel.php";
            } else {
                swal("Alert!", text, "error");
            }
        }
    }

    r.open("POST", "addColorProces.php", true);
    r.send(form);
}


function addCurrency() {
    var cu = document.getElementById("cu");

    var form = new FormData();
    form.append("cu", cu.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Product added successfully") {
                swal("Done!", "Currency added successfully", "success");
                window.location = "adminpanel.php";
            } else {
                swal("Alert!", text, "error");
            }
        }
    }

    r.open("POST", "addCurrencyProces.php", true);
    r.send(form);
}



function blockcurrency(id) {
    var id = id;
    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                window.location = "adminpanel.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock"
            } else if (t == "success2") {
                window.location = "adminpanel.php";
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block"
            }
        }
    }

    r.open("POST", "currencyBlockProcess.php", true);
    r.send(f);
}
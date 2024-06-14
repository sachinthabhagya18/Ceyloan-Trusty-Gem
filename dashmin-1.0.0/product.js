function changeImage() {
    var image = document.getElementById("imguploader"); //file chooser
    var view = document.getElementById("prev"); //image tag

    image.onchange = function() {
        var file = this.files[0]; //image eka thiyana file path eka
        var url = window.URL.createObjectURL(file); //file location eka tempary url ekak lesa sakasima

        view.src = url; //img tag eke src ekata url eka laba dima
    }
}

function changeImage2() {
    var image = document.getElementById("imguploader2"); //file chooser
    var view = document.getElementById("prev2"); //image tag

    image.onchange = function() {
        var file = this.files[0]; //image eka thiyana file path eka
        var url = window.URL.createObjectURL(file); //file location eka tempary url ekak lesa sakasima

        view.src = url; //img tag eke src ekata url eka laba dima
    }
}

function changeImage3() {
    var image = document.getElementById("imguploader3"); //file chooser
    var view = document.getElementById("prev3"); //image tag

    image.onchange = function() {
        var file = this.files[0]; //image eka thiyana file path eka
        var url = window.URL.createObjectURL(file); //file location eka tempary url ekak lesa sakasima

        view.src = url; //img tag eke src ekata url eka laba dima
    }
}

function changeImage4() {
    var image = document.getElementById("imguploader4"); //file chooser
    var view = document.getElementById("prev4"); //image tag

    image.onchange = function() {
        var file = this.files[0]; //image eka thiyana file path eka
        var url = window.URL.createObjectURL(file); //file location eka tempary url ekak lesa sakasima

        view.src = url; //img tag eke src ekata url eka laba dima
    }
}

function changeImage5() {
    var image = document.getElementById("imguploader5"); //file chooser
    var view = document.getElementById("prev5"); //image tag

    image.onchange = function() {
        var file = this.files[0]; //image eka thiyana file path eka
        var url = window.URL.createObjectURL(file); //file location eka tempary url ekak lesa sakasima

        view.src = url; //img tag eke src ekata url eka laba dima
    }
}


function addProduct() {
    var category = document.getElementById("category");
    var color = document.getElementById("color");
    var model = document.getElementById("model");
    var title = document.getElementById("title");
    var price = document.getElementById("price");
    var qty = document.getElementById("qty");
    var description = document.getElementById("des");
    var link = document.getElementById("link");

    var image = document.getElementById("imguploader");
    var image2 = document.getElementById("imguploader2");
    var image3 = document.getElementById("imguploader3");
    var image4 = document.getElementById("imguploader4");
    var image5 = document.getElementById("imguploader5");

    // alert(category);
    // alert(color);
    // alert(model);
    // alert(title);
    // alert(price);
    // alert(qty);
    // alert(description);



    var form = new FormData();
    form.append("category", category.value);
    form.append("color", color.value);
    form.append("model", model.value);
    form.append("title", title.value);
    form.append("qty", qty.value);
    form.append("price", price.value);
    form.append("des", description.value);
    form.append("link", link.value);
    form.append("img", image.files[0]);
    form.append("img2", image2.files[0]);
    form.append("img3", image3.files[0]);
    form.append("img4", image4.files[0]);
    form.append("img5", image5.files[0]);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Product added successfully") {
                swal("Done!", "Product added successfully", "success");
                window.location = "manageproduct.php";
            } else {
                swal("Alert!", text, "error");
            }
        }
    }

    r.open("POST", "addProductProces.php", true);
    r.send(form);

}


//block poduct

function blockproduct(id) {
    var id = id;
    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                window.location = "manageProduct.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock"
            } else if (t == "success2") {
                window.location = "manageProduct.php";
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block"
            }
        }
    }

    r.open("POST", "productBlockProcess.php", true);
    r.send(f);
}


function singleviewmodal(id) {
    var pop = document.getElementById("singleproductview" + id);

    k = new bootstrap.Modal(pop);
    k.show();
}



/////////UPDATE PRODUCT //////////////


function sendid(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "updateProduct.php";
            }
        }
    };
    requset.open("GET", "sendproductprocess.php?id=" + id, true);
    requset.send();
}





function updateproduct(id) {

    var pid = id;

    var category = document.getElementById("category");
    var color = document.getElementById("color");
    var model = document.getElementById("model");
    var title = document.getElementById("title");
    var price = document.getElementById("price");

    var qty = document.getElementById("qty");
    var description = document.getElementById("des");
    var link = document.getElementById("link");

    var image = document.getElementById("imguploader");
    var image2 = document.getElementById("imguploader2");
    var image3 = document.getElementById("imguploader3");
    var image4 = document.getElementById("imguploader4");
    var image5 = document.getElementById("imguploader5");


    var form = new FormData();
    form.append("id", pid);
    form.append("category", category.value);
    form.append("color", color.value);
    form.append("model", model.value);
    form.append("title", title.value);
    form.append("qty", qty.value);

    form.append("price", price.value);
    form.append("des", description.value);
    form.append("link", link.value);
    form.append("img", image.files[0]);
    form.append("img2", image2.files[0]);
    form.append("img3", image3.files[0]);
    form.append("img4", image4.files[0]);
    form.append("img5", image5.files[0]);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "Product updated successfully") {
                swal("Done!", "Product Update successfully", "success");
                window.location = "manageProduct.php";
            } else {
                swal("Alert!", text1, "error");
            }
        }
    }

    r1.open("POST", "updateProductProces.php", true);
    r1.send(form);
}



function addAuction() {
    var category = document.getElementById("category");
    var color = document.getElementById("color");
    var model = document.getElementById("model");
    var title = document.getElementById("title");
    var price = document.getElementById("price");
    var qty = document.getElementById("qty");
    var description = document.getElementById("des");
    var exdate = document.getElementById("exdate");
    var image = document.getElementById("imguploader");
    var image2 = document.getElementById("imguploader2");
    var image3 = document.getElementById("imguploader3");
    var image4 = document.getElementById("imguploader4");
    var image5 = document.getElementById("imguploader5");

    // alert(category);
    // alert(color);
    // alert(model);
    // alert(title);
    // alert(price);
    // alert(qty);
    // alert(description);
    // alert(exdate.value);

    var form = new FormData();
    form.append("category", category.value);
    form.append("color", color.value);
    form.append("model", model.value);
    form.append("title", title.value);
    form.append("qty", qty.value);
    form.append("price", price.value);
    form.append("des", description.value);
    form.append("img", image.files[0]);
    form.append("img2", image2.files[0]);
    form.append("img3", image3.files[0]);
    form.append("img4", image4.files[0]);
    form.append("img5", image5.files[0]);
    form.append("exdate", exdate.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Product added successfully") {
                email.value = "";
                window.location = "addAuction.php";
                swal("Done!", "Product added successfully", "success");
                window.location = "manageProduct.php";
            } else {
                swal("Alert!", text, "error");
            }
        }
    }

    r.open("POST", "addAuctionProces.php", true);
    r.send(form);

}


function blockproductau(id) {
    var id = id;


    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success1") {
                window.location = "manageAuction.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock"
            } else if (t == "success2") {
                window.location = "manageAuction.php";
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block"
            }
        }
    }

    r.open("POST", "blockauctionpd.php", true);
    r.send(f);
}


// function sendidau(id) {

//     var id = id;
//     alert(id);

//     var requset = new XMLHttpRequest();
//     requset.onreadystatechange = function() {
//         if (requset.readyState == 4) {

//             var t = requset.responseText;
//             alert(t);
//             if (t == "success") {
//                 window.location = "updateauction.php";
//             }
//         }
//     };
//     requset.open("GET", "sendauctionproductprocess.php?id=" + id, true);
//     requset.send();
// }

function sendid3(id) {
    //alert(id);
    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {

            var t = requset.responseText;

            if (t == "success") {
                window.location = "creatauction.php";
            } else {
                alert(t);
            }
        }
    };
    requset.open("GET", "sendauctionproductprocess.php?id=" + id, true);
    requset.send();
}



function updateproductau(id) {

    var pid = id;

    var price = document.getElementById("price");
    var date = document.getElementById("date");



    var form = new FormData();
    form.append("id", pid);
    form.append("date", date.value);
    form.append("price", price.value);


    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "Product updated successfully") {
                swal("Done!", "Product Update successfully", "success");
                window.location = "manageProduct.php";
            } else {
                swal("Alert!", text1, "error");
            }
        }
    }

    r1.open("POST", "updateAuctionProces.php", true);
    r1.send(form);
}


//////////////////////////////OFFERS/////////////////////////////////////

function sendid2(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "addOffers.php";
            }
        }
    };
    requset.open("GET", "sendproductOffersprocess.php?id=" + id, true);
    requset.send();
}



function addOffer(id) {

    var pid = id;
    var amount = document.getElementById("amount");
    var description = document.getElementById("des");


    var form = new FormData();
    form.append("id", pid);
    form.append("amount", amount.value);
    form.append("des", description.value);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "Product updated successfully") {
                window.location = "manageOffers.php";
                swal("Done!", "Product Update successfully", "success");
            } else {
                swal("Alert!", text1, "error");
            }
        }
    }

    r1.open("POST", "updateaddOffers.php", true);
    r1.send(form);
}

function blockOffers(id) {
    var id = id;


    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success1") {
                window.location = "manageOffers.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock"
            } else if (t == "success2") {
                window.location = "manageOffers.php";
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block"
            }
        }
    }

    r.open("POST", "blockOffers.php", true);
    r.send(f);
}
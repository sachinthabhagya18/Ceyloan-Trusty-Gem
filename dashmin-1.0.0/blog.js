function changeImage() {
    var image = document.getElementById("imguploader"); //file chooser
    var view = document.getElementById("prev"); //image tag

    image.onchange = function() {
        var file = this.files[0]; //image eka thiyana file path eka
        var url = window.URL.createObjectURL(file); //file location eka tempary url ekak lesa sakasima

        view.src = url; //img tag eke src ekata url eka laba dima
    }
}


function addBlock() {
    var title = document.getElementById("title");
    var p1 = document.getElementById("p1");
    var p2 = document.getElementById("p2");
    var note = document.getElementById("note");
    var image = document.getElementById("imguploader");


    var form = new FormData();
    form.append("title", title.value);
    form.append("p2", p2.value);
    form.append("p1", p1.value);
    form.append("note", note.value);
    form.append("img", image.files[0]);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Block added successfully") {
                window.location = "manageBlog.php";
                swal("Done!", "Block added successfully", "success");
            } else {
                swal("Alert!", text, "error");
            }
        }
    }

    r.open("POST", "addBlogProces.php", true);
    r.send(form);

}




/////////UPDATE PRODUCT //////////////


function sendid(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "updateBlog.php";
            }
        }
    };
    requset.open("GET", "sendBlogprocess.php?id=" + id, true);
    requset.send();
}



function updateBlog(id) {

    var pid = id;

    var title = document.getElementById("title");
    var p1 = document.getElementById("p1");
    var p2 = document.getElementById("p2");
    var note = document.getElementById("note");
    var image = document.getElementById("imguploader");


    var form = new FormData();
    form.append("id", pid);
    form.append("title", title.value);
    form.append("p2", p2.value);
    form.append("p1", p1.value);
    form.append("note", note.value);
    form.append("img", image.files[0]);


    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "Product updated successfully") {
                window.location = "manageBlog.php";
                swal("Done!", "Blog Update successfully", "success");
            } else {
                swal("Alert!", text1, "error");
            }
        }
    }

    r1.open("POST", "updateBlogProces.php", true);
    r1.send(form);
}


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
                window.location = "manageBlog.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock"
            } else if (t == "success2") {
                window.location = "manageBlog.php";
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block"
            }
        }
    }

    r.open("POST", "blogBlockProcess.php", true);
    r.send(f);
}
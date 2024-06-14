function placeBid(id) {

    var pid = id;
    var txt = document.getElementById("txt").value;
    // alert(txt);
    var form = new FormData();
    form.append("id", id);
    form.append("txt", txt);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            if (r.responseText == "Your Auction Added") {
                //alert(r.responseText);
                swal("Done!", "Auction Updated successful", "success");
                document.getElementById("txt").value = "";
                location.reload()
                    //    window.location = "Auctionview.php";

            } else if (r.responseText == "error") {
                window.location = "Auctionview.php";
                swal("Alert!", r.responseText, "error");
                // alert(r.responseText);
            } else {
                swal("Alert!", r.responseText, "error");
                // alert(r.responseText);
            }


        }
    };
    r.open("POST", "Placebid.php", true);
    r.send(form);




}



$('[data-countdown]').each(function() {
    var $this = $(this),
        finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('<div class="single-countdown big-font"><span class="single-countdown-time">%D</span><span class="single-countdown-text">days,</span></div><div class="single-countdown"><span class="single-countdown-time">%H</span><span class="single-countdown-text">h</span></div><div class="single-countdown"><span class="single-countdown-time">%M</span><span class="single-countdown-text">m</span></div><div class="single-countdown"><span class="single-countdown-time">%S</span><span class="single-countdown-text">s</span></div>'));
    });
});
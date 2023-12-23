var bell = document.querySelector(".fa-bell");
var order_tracking_form_div = document.querySelector(".order_tracking_form_div");

bell.addEventListener("click", () => {
    if (order_tracking_form_div.style.top == "-100%") {
        order_tracking_form_div.style.top = "10%";
        order_tracking_form_div.style.opacity = 1;
    } else {
        order_tracking_form_div.style.top = "-100%";
        order_tracking_form_div.style.opacity = 0;
    }
})

$(document).ready(function () {
    $("#order_tracking_form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "customer_order_tracking_process.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                alert(response);
            },
            error: function () {
                alert("ERROR By Ajac");
            }
        })
    })
})
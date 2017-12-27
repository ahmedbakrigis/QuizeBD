$(function () {
$("#php").click(function () {
    $.ajax(
        {
            url    :"Qout.php",
            success: function (result) {
                $("#result").html(result);
            }
        }
    )
})
});
$(document).ready(function() {
    $("#checkin-date").datepicker({
        dateFormat: "D, M d, yy",
        onSelect: function(dateText) {
            updateStayDetails();
        }
    });
    $("#checkout-date").datepicker({
        dateFormat: "D, M d, yy",
        onSelect: function(dateText) {
            updateStayDetails();
        }
    });
    $("#guest-select").on("change", function() {
        updateStayDetails();
    });

    function updateStayDetails() {
        var checkinDate = $("#checkin-date").val();
        var checkoutDate = $("#checkout-date").val();
        var guests = $("#guest-select option:selected").text();
        $("#stay-dates").text(checkinDate + " - " + checkoutDate);
        $("#guest-info").text(guests);
    }
});

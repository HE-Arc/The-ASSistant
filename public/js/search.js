/* This is a jQuery function that is called when the document is ready. It is waiting for the click
event on the clearButton. When the click event is triggered, it will clear the value of the search
input. */
$(document).ready(function () {
    $("#clearButton").click(function () {
        $("#search").val('');
    });
})

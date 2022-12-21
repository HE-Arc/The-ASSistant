let old_id = 0;

$(document).ready(function () {
    /* Clearing the search bar when the clear button is clicked. */
    $("#clearButton").click(function () {
        $("#search").val('');
    });

    /* Hiding the option that is selected in the first dropdown from the second dropdown. */
    $("#inputTypeOne").change(function (e) {
        $("#inputTypeTwo option[value=" + old_id + "]").show();
        let typeOneId = $(this).find("option:selected", this).val();
        old_id = typeOneId
        $("#inputTypeTwo option[value=" + typeOneId + "]").hide();
    });
})


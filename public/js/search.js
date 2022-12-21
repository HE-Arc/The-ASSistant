let oldTypeOne = 0;
let oldTypeTwo = 0;

$(document).ready(function () {
    /* This is a function that hides the option that is selected in the first dropdown from the second
    dropdown. */
    let typeOneId = $("#inputTypeOne").find("option:selected", this).val();
    oldTypeOne = typeOneId
    $("#inputTypeTwo option[value=" + typeOneId + "]").hide();

    let typeTwoId = $("#inputTypeTwo").find("option:selected", this).val();
    oldTypeTwo = typeTwoId
    $("#inputTypeOne option[value=" + typeTwoId + "]").hide();

    /* Clearing the search bar when the clear button is clicked. */
    $("#clearButton").click(function () {
        $("#search").val('');
    });

    /* Hiding the option that is selected in the first dropdown from the second dropdown. */
    $("#inputTypeOne").change(function (e) {
        $("#inputTypeTwo option[value=" + oldTypeOne + "]").show();
        let typeOneId = $(this).find("option:selected", this).val();
        oldTypeOne = typeOneId
        $("#inputTypeTwo option[value=" + typeOneId + "]").hide();
    });

    $("#inputTypeTwo").change(function (e) {
        $("#inputTypeOne option[value=" + oldTypeTwo + "]").show();
        let typeTwoId = $("#inputTypeTwo").find("option:selected", this).val();
        oldTypeTwo = typeTwoId
        $("#inputTypeOne option[value=" + typeTwoId + "]").hide();
    });
})


// Password Confirmation and validation

jQuery(function () {
    $(".confirmDelete").click(function () {
        var name = $(this).attr("name");
        if (confirm("Are you sure you want to delete this " + name + "?")) {
            return true;
        } else {
            return false;
        }
    });
});

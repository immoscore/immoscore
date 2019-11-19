$("body").delegate(".delete_record", "click", function (e) {
    if (confirm("Are you sure you want to delete this record?")) {
        return true;
    } else {
        return false;
    }
})
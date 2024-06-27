var FormAction = function() {

    return {
        "init": function() {
            console.log("init ajax action");

            $('.ajax-action').click(function(e) {
                var trigger = $(this);
                e.preventDefault();
                console.log("ajax action clicked");
                swal.fire({
                    title: 'Confirm',
                    text: $(this).attr("data-confirm-message"),
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: $(trigger).attr("href"),
                            method: "get",
                            complete: function(result) {
                                var response = $.parseJSON(result.responseText);
                                var success = response.success == 1 ? "success" : "error";
                                swal.fire(
                                    response.title,
                                    response.message,
                                    success
                                )
                                if (response.success == 1) {
                                    var container = $(trigger).closest("tr");
                                    $(container).remove();
                                }
                            }
                        });
                    }
                });

                return false;
            });

        }
    }
}();

$(document).ready(function() {
    FormAction.init();
});
<script type="text/javascript" src='{{ asset('assets/js/jquery.min.js') }}'></script>

<script type="text/javascript" src='{{ asset('assets/js/bootstrap.bundle.min.js') }}'></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src='{{ asset('assets/js/dataTables.bootstrap4.min.js') }}'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="http://socialfansgeek.loc/js/vendor/bootbox/bootbox.min.js?v=5.3"></script>

<script>
    $(document).on("click", ".btn-delete-record", function (e) {
        $button = $(this);
        bootbox.confirm({
            message: "Are you sure to delete the record?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-default'
                }
            },
            callback: function (result) {
                // Indusrabbit SMM Panle
                if (result) {
                    $button.parents('form').submit();
                }
            }
        });
    });

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
</script>
@stack('js')

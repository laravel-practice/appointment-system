<script type="text/javascript" src='{{ asset('assets/js/jquery.min.js') }}'></script>
<script type="text/javascript" src='{{ asset('assets/js/jquery.validate.js') }}'></script>
<script type="text/javascript" src='{{ asset('assets/js/additional-methods.min.js') }}'></script>
<script type="text/javascript" src='{{ asset('assets/js/bootstrap.bundle.min.js') }}'></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
</script>
@stack('js')

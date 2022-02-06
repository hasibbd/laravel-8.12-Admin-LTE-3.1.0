<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--Toaster-->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('custom/js/auth.js')}}"></script>
<script>
    $(document).ready(function() {
        if($('#check').val() == 1){
            $('.alert').alert()
            setTimeout(function() {
                $(".alert").alert('close');
            }, 4000);
        }else{
            $('.alert').alert('close')
        }
    });
</script>

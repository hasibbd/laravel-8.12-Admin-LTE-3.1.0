$(document).ready(function () {

    var base = window.location.origin;
    function loading(type,text) {
        if (type == 'on'){
           $('.load').prop("disabled",true).html('<span class="spinner-border spinner-border-sm mr-3" role="status" aria-hidden="true"></span>'+text);
        }else{
            $('.load').prop("disabled",false).text(text);
        }
    }
    function formReset(){
        $(".select2bs4").val(null).trigger('change');
        $(".select2").val(null).trigger('change');
        $('.modal').modal('hide');
        $('form').trigger("reset");
        $("formId")[0].reset()
    }

    $('#user_submit').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
       if ($('#password').val() === $('#c_password').val()){
           loading('on','Wait...')
           let formData = new FormData(this);
           let  my_url = base + "/user-create";
           $.ajax({
               type: 'post',
               url: my_url,
               data: formData,
               cache: false,
               contentType: false,
               processData: false,
               success: (data) => {
                   loading('off','Submit')
                   toastr.success(data.message)
                   formReset();
               },
               error: function (data) {
                   loading('off','Submit')
                   toastr.error(data.responseJSON.message)

               }
           });
       }else{
           toastr.error('Password did not match')
       }
    });
    $('#user_forget').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        loading('on','Sending...')
        var  my_url = base + "/user-forget";
        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                loading('off','Request for reset link')
                toastr.success(data.message)
                formReset();
            },
            error: function (data) {
                loading('off','Request for reset link')
                toastr.error(data.responseJSON.message)

            }
        });
    });
    $('#reset_pass').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);

        var  my_url = base + "/reset-user-pass";
        if ($('#password').val() == $('#c_password').val()){
            loading('on','Wait..')
            $.ajax({
                type: 'post',
                url: my_url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    formReset();
                    toastr.success(data.message)
                    loading('off','Submit')

                },
                error: function (data) {
                    loading('off','Submit')
                    toastr.error(data.responseJSON.message)
                }
            });
        }else{
            toastr.error('Password did not matched');
        }

    });

});

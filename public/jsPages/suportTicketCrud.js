
$(document).ready(function (e) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#ticket_form').submit(function (e) {
        e.preventDefault();
        //Saved
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "store-data",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {


                Swal.fire(
                    'Saved success!',
                    'Your ticket has been successfully created, Ref Number : ' + data.ref_no,
                    'success'
                );

                reset_feild();


            },
            error: function (data) {
                if (data.responseJSON.errors.name == "The name field is required.") {
                    printErrorMsg1("The name field is required.");
                }
                if (data.responseJSON.errors.email == "The email field is required.") {
                    printErrorMsg2("The email field is required.");
                }
                if (data.responseJSON.errors.description == "The description field is required.") {
                    printErrorMsg3("The description field is required.");
                }

            }
        });

    });


    $('#btnSearch').on('click', function () {

        var ref_no = $('#typeRefNo').val();
        var $token=$('#token').val();
        var formData = new FormData();
        formData.append("_token",$token);
        formData.append('ref_no',ref_no);
     
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "search_ref",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#name').val(data[0].customer_name);
                $('#description').val(data[0].problem_description);
                $('#email').val(data[0].email);
                $('#phone_number').val(data[0].phone_number);
                if(data[0].reply!=null){
                $('#reply').val(data[0].reply);
                }else{
                $('#reply').val(data[0].reply);
                }
                $('#statustext').text(data[0].status);
            },
            error: function (data) {
                

            }
        });
    });


    $('#btnClear').on('click',function(){
        reset_feild();
    });






    function printErrorMsg1(msg) {
        $(".print-error-msg1").find("ul").html('');
        $(".print-error-msg1").css('display', 'block');
        $(".print-error-msg1").find("ul").append('<li>' + msg + '</li>');
    }

    function printErrorMsg2(msg) {
        $(".print-error-msg2").find("ul").html('');
        $(".print-error-msg2").css('display', 'block');
        $(".print-error-msg2").find("ul").append('<li>' + msg + '</li>');
    }

    function printErrorMsg3(msg) {
        $(".print-error-msg3").find("ul").html('');
        $(".print-error-msg3").css('display', 'block');
        $(".print-error-msg3").find("ul").append('<li>' + msg + '</li>');
    }

    function reset_feild() {
        $('#name').val("");
        $('#description').val("");
        $('#email').val("");
        $('#phone_number').val("");
        $('#statustext').text("");
        $('#reply').val("");
    }
});
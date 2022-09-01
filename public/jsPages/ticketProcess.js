
$(document).ready(function (e) {
    loadeTicketDetails();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#reply-form').submit(function (e) {
        e.preventDefault();
        //Saved
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "store-reply",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
              
               
                Swal.fire(
                    'Saved success!',
                    'Reply has been successfully sent, Ref Number : '+data.ref_no,
                    'success'
                );

                reset_feild();


            },
            error: function (data) {
                if (data.responseJSON.errors.reply == "The reply field is required.") {
                    printErrorMsg1("The reply field is required.");
                }
               
            }
        });

    });
});

function printErrorMsg1(msg) {
    $(".print-error-msg1").find("ul").html('');
    $(".print-error-msg1").css('display', 'block');
    $(".print-error-msg1").find("ul").append('<li>' + msg + '</li>');
}

function loadeTicketDetails() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "ticketlist",
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            var html = "";

            $(data.ticket_details.data).each(function (key, val) {
                var ref_number = val.ref_no;
                var Name = val.customer_name;
                var Status = val.status;
                var isView = val.isView;
                html += '<li class="ticket-item">';
                html += '<div class="row">';
                html += '<div class="ticket-user col-md-1 col-sm-12">';
                html += '<img src="https://bootdey.com/img/Content/user_1.jpg" class="user-avatar">';
                html += '</div>';
                html += '<div class="ticket-time  col-md-2 col-sm-6 col-xs-12">';
                html += ref_number;
                html += '</div>';
                html += '<div class="ticket-time  col-md-3 col-sm-6 col-xs-12">';
                html += Name;
                html += '</div>';
                html += '<div class="ticket-time  col-md-2 col-sm-6 col-xs-12">';
                html += ' <div class="divider hidden-md hidden-sm hidden-xs"></div>';
                html += ' <i class="fa fa-clock-o"></i>';
                if (isView == 0) {
                    html += ' <span class="badge badge-danger" style="background-color: red ">New</span>';
                 }
                html += ' </div>';
                html += '<div class="ticket-type  col-md-2 col-sm-6 col-xs-12">';
                html += '<span class="divider hidden-xs"></span>';
                html += '<span class="type"><strong>' + Status + '</strong></span>';
                html += '</div>';
                html += '<div class="ticket-type  col-md-2 col-sm-6 col-xs-12">';
                html += ' <button class="btn btn-info  btn-sm" onclick="viewTicket(' + val.id + ')">View</button>';
                html += '</div>';
                if (Status == "Pending") {
                    html += ' <div class="ticket-state bg-yellow">';
                    html += '<i class="fa fa-info"></i>';
                    html += ' </div>';
                } else if (Status == "Open") {
                    html += '<div class="ticket-state bg-palegreen">';
                    html += '<i class="fa fa-check"></i>';
                    html += '</div>';
                } else if (Status == "Closed") {
                    html += '<div class="ticket-state bg-darkorange">';
                    html += '<i class="fa fa-times"></i>';
                    html += '</div>';
                }

                html += ' </div>';
                html += ' </li>';
            });


            $('#ticketBody').html(html);
            var last_page = data.ticket_details.last_page;
            var current_page = data.ticket_details.current_page;
            var last_page_url = data.ticket_details.last_page_url;
            var Previous = 1;
            if (current_page > 1) {
                Previous = current_page - 1;
            }
            var Next = current_page + 1;
            if (last_page_url == current_page) {
                Next = current_page;
            }

            var pagination = "";
            pagination += '<nav aria-label="Page navigation example">';
            pagination += '<ul class="pagination">';
            pagination += '<li class="page-item"><a class="page-link" href="#" onclick="loadTableData(' + Previous + ')">Previous</a></li>';
            for (var i = 1; i <= last_page; i++) {
                if (current_page == i) {
                    pagination += '<li class="page-item active"><a class="page-link"  onclick="loadTableData(' + i + ')">' + i + '</a></li>'
                } else {
                    pagination += '<li class="page-item"><a class="page-link"onclick="loadTableData(' + i + ')">' + i + '</a></li>'
                }
            }
            pagination += '<li class="page-item"><a class="page-link" onclick="loadTableData(' + Next + ')" >Next</a></li>';
            pagination += '</ul>';
            pagination += '</nav>';



            $('#pagination').html(pagination);
        },
        error: function (data) {
            // console.log(data);
        }
    });
}

function loadTableData(url) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "ticketlist?page=" + url,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            var html = "";

            $(data.ticket_details.data).each(function (key, val) {
                var ref_number = val.ref_no;
                var Name = val.customer_name;
                var Status = val.status;
                var isView = val.isView;
                html += '<li class="ticket-item">';
                html += '<div class="row">';
                html += '<div class="ticket-user col-md-1 col-sm-12">';
                html += '<img src="https://bootdey.com/img/Content/user_1.jpg" class="user-avatar">';
                html += '</div>';
                html += '<div class="ticket-time  col-md-2 col-sm-6 col-xs-12">';
                html += ref_number;
                html += '</div>';
                html += '<div class="ticket-time  col-md-3 col-sm-6 col-xs-12">';
                html += Name;
                html += '</div>';
                html += '<div class="ticket-time  col-md-2 col-sm-6 col-xs-12">';
                html += ' <div class="divider hidden-md hidden-sm hidden-xs"></div>';
                html += ' <i class="fa fa-clock-o"></i>';
                if (isView == 0) {
                    html += ' <span class="badge badge-danger" style="background-color: red ">New</span>';
                 }
                html += ' </div>';
                html += '<div class="ticket-type  col-md-2 col-sm-6 col-xs-12">';
                html += '<span class="divider hidden-xs"></span>';
                html += '<span class="type"><strong>' + Status + '</strong></span>';
                html += '</div>';
                html += '<div class="ticket-type  col-md-2 col-sm-6 col-xs-12">';
                html += ' <button class="btn btn-info  btn-sm" onclick="viewTicket(' + val.id + ')">View</button>';
                html += '</div>';
                if (Status == "Pending") {
                    html += ' <div class="ticket-state bg-yellow">';
                    html += '<i class="fa fa-info"></i>';
                    html += ' </div>';
                } else if (Status == "Open") {
                    html += '<div class="ticket-state bg-palegreen">';
                    html += '<i class="fa fa-check"></i>';
                    html += '</div>';
                } else if (Status == "Closed") {
                    html += '<div class="ticket-state bg-darkorange">';
                    html += '<i class="fa fa-times"></i>';
                    html += '</div>';
                }

                html += ' </div>';
                html += ' </li>';
            });


            $('#ticketBody').html(html);
            var last_page = data.ticket_details.last_page;
            var current_page = data.ticket_details.current_page;
            var last_page_url = data.ticket_details.last_page_url;
            var Previous = 1;
            if (current_page > 1) {
                Previous = current_page - 1;
            }
            var Next = current_page + 1;
            if (last_page_url == current_page) {
                Next = current_page;
            }

            var pagination = "";
            pagination += '<nav aria-label="Page navigation example">';
            pagination += '<ul class="pagination">';
            pagination += '<li class="page-item"><a class="page-link" href="#" onclick="loadTableData(' + Previous + ')">Previous</a></li>';
            for (var i = 1; i <= last_page; i++) {
                if (current_page == i) {
                    pagination += '<li class="page-item active"><a class="page-link"  onclick="loadTableData(' + i + ')">' + i + '</a></li>'
                } else {
                    pagination += '<li class="page-item"><a class="page-link"onclick="loadTableData(' + i + ')">' + i + '</a></li>'
                }
            }
            pagination += '<li class="page-item"><a class="page-link" onclick="loadTableData(' + Next + ')" >Next</a></li>';
            pagination += '</ul>';
            pagination += '</nav>';



            $('#pagination').html(pagination);
        },
        error: function (data) {
            // console.log(data);
        }
    });




}

function viewTicket(ticketID) {

    window.location.replace('view_ticket/' + ticketID);

}

$('#btnSearch').on('click',function(){
    var txtCustomeName=$('#txtCustomeName').val();
  
    var formData = new FormData();
    formData.append('txtCustomeName',txtCustomeName);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "ticketlistCustomerWise",
        cache: false,
        data:formData,
        contentType: false,
        processData: false,
        success: (data) => {
            var html = "";

            $(data.ticket_details.data).each(function (key, val) {
                var ref_number = val.ref_no;
                var Name = val.customer_name;
                var Status = val.status;
                var isView = val.isView;
                html += '<li class="ticket-item">';
                html += '<div class="row">';
                html += '<div class="ticket-user col-md-1 col-sm-12">';
                html += '<img src="https://bootdey.com/img/Content/user_1.jpg" class="user-avatar">';
                html += '</div>';
                html += '<div class="ticket-time  col-md-2 col-sm-6 col-xs-12">';
                html += ref_number;
                html += '</div>';
                html += '<div class="ticket-time  col-md-3 col-sm-6 col-xs-12">';
                html += Name;
                html += '</div>';
                html += '<div class="ticket-time  col-md-2 col-sm-6 col-xs-12">';
                html += ' <div class="divider hidden-md hidden-sm hidden-xs"></div>';
                html += ' <i class="fa fa-clock-o"></i>';
                if (isView == 0) {
                    html += ' <span class="badge badge-danger" style="background-color: red ">New</span>';
                 }
                html += ' </div>';
                html += '<div class="ticket-type  col-md-2 col-sm-6 col-xs-12">';
                html += '<span class="divider hidden-xs"></span>';
                html += '<span class="type"><strong>' + Status + '</strong></span>';
                html += '</div>';
                html += '<div class="ticket-type  col-md-2 col-sm-6 col-xs-12">';
                html += ' <button class="btn btn-info  btn-sm" onclick="viewTicket(' + val.id + ')">View</button>';
                html += '</div>';
                if (Status == "Pending") {
                    html += ' <div class="ticket-state bg-yellow">';
                    html += '<i class="fa fa-info"></i>';
                    html += ' </div>';
                } else if (Status == "Open") {
                    html += '<div class="ticket-state bg-palegreen">';
                    html += '<i class="fa fa-check"></i>';
                    html += '</div>';
                } else if (Status == "Close") {
                    html += '<div class="ticket-state bg-darkorange">';
                    html += '<i class="fa fa-times"></i>';
                    html += '</div>';
                }

                html += ' </div>';
                html += ' </li>';
            });


            $('#ticketBody').html(html);
            var last_page = data.ticket_details.last_page;
            var current_page = data.ticket_details.current_page;
            var last_page_url = data.ticket_details.last_page_url;
            var Previous = 1;
            if (current_page > 1) {
                Previous = current_page - 1;
            }
            var Next = current_page + 1;
            if (last_page_url == current_page) {
                Next = current_page;
            }

            var pagination = "";
            pagination += '<nav aria-label="Page navigation example">';
            pagination += '<ul class="pagination">';
            pagination += '<li class="page-item"><a class="page-link" href="#" onclick="loadTableData(' + Previous + ')">Previous</a></li>';
            for (var i = 1; i <= last_page; i++) {
                if (current_page == i) {
                    pagination += '<li class="page-item active"><a class="page-link"  onclick="loadTableData(' + i + ')">' + i + '</a></li>'
                } else {
                    pagination += '<li class="page-item"><a class="page-link"onclick="loadTableData(' + i + ')">' + i + '</a></li>'
                }
            }
            pagination += '<li class="page-item"><a class="page-link" onclick="loadTableData(' + Next + ')" >Next</a></li>';
            pagination += '</ul>';
            pagination += '</nav>';



            $('#pagination').html(pagination);
        },
        error: function (data) {
            // console.log(data);
        }
    });

});

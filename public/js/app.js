$(function () {

    let CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    let uploadForm = $('#upload-form');
    let listTable = $('.table > tbody');
    let url = uploadForm.attr('action');
    let method = uploadForm.attr('method');

    uploadForm.on('submit', function (event) {
        event.preventDefault();

        let files = $('#csvFile')[0].files;
        let fd = new FormData();
        fd.append('file',files[0]);
        fd.append('_token',CSRF_TOKEN);

        $.ajax({
            type: method,
            timeout: 50000,
            url: url,
            dataType: 'json',
            data: fd,
            success: function (response) {
                anim(1, response.message);
                fillTable(listTable, response.data);
            },
            error: function(response) {
                anim(0, response.message);
            }
        });
        // let data = $(uploadForm).serialize();
        // $.post(url, data, function (response) {
        //     let flag = 0;
        //     if(response.success) {
        //         flag = 1;
        //     } else {
        //         flag = 0;
        //     }
        //
        //     anim(flag, response.message);
        // })
    });
});

function anim(opt=0, message) {
    let text = [
        '<div class="alert alert-danger alert-dismissible fade in" style="text-align: center;">' + message + '</div>'
        ,'<div class="alert alert-success alert-dismissible fade in" style="text-align: center;">' + message + '</div>'
    ]
    $("#result").hide().html(text[opt]).slideDown().delay(2000).slideUp();
}

function fillTable(listTable, data) {
    $.each($.parseJSON(data), function(item){
        listTable.append(
            "<tr>" +
                "<td>"+item.employee_id+"</td>" +
                "<td>"+item.name+"</td>" +
                "<td>"+item.surname+"</td>" +
                "<td>"+item.email+"</td>" +
                "<td>"+item.phone+"</td>" +
                "<td>"+item.point+"</td>" +
            "</tr>"
        );
    });
}

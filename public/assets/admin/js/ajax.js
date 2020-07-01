// import { types } from "sass";

        
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('.idCategory').change(function () {
        let idCate = $(this).val();
        $.ajax({
            url: 'admin/ajax/producttype',
            data: {
                idCate: idCate,
            },
            type: 'get',
            dataType: 'json',
            success: function (data) {
                let html = '';
                $.each(data, function ($key, $value) {
                    html += '<option value=' + $value['id'] + '>';
                    html += $value['name'];
                    html += '</option>';
                });
                $('.idProductType').html(html);
            }
        });
    });

    
   
    $('.order-status').change(function () {
        let orderStatus = $(this).val();
        let orderId = $(this).attr('data-id');

        
        $.ajax({
            url: 'admin/ajax/setorder',
            data: {
                orderId: orderId,
                orderStatus: orderStatus
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
            
               location.reload();
            }
        });
    });



});

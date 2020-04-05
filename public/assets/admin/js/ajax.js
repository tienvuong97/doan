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
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {

    $('body').on('change', '.js-quantity', function (e) {
        e.preventDefault();
        let quantity = $(this).val()
        let id = $(this).attr('p-id')
        console.log(quantity, id);
        $.ajax({
            url: 'get-price/' + id,
            type: 'get',
            dataType: 'json',
            data: {
                quantity: quantity,
            },
            success: function (data) {
                console.log(data)
                location.reload();

            }
        });
    })
    $('body').on('click', '.add_cart', function () {
        let id = $(this).attr('data-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: '/cart/add/' + id,
            // data: {
            //     _token: "{{ csrf_token() }}"
            // },
            success: function (res) {
                console.log("res: ",res)
                if(res[1]['status']){
                    $(".count_cart").html(res[1]['data']);
                    toastr.success('Đã thêm vào giỏ hàng')

                }
            }
        });
    })
    

});
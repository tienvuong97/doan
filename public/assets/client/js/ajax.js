$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
  
    $('body').on('change', '.js-quantity', function(e) {
        e.preventDefault();
        let quantity = $(this).val()
        let id = $(this).attr('p-id')
        console.log(quantity, id);
        $.ajax({
            url :'get-price/'+id,
            type : 'get',
            dataType: 'json',
            data:{
                quantity : quantity,
            },
            success : function(data){
                console.log(data)
                location.reload();

            }
        });
    })
    
});
<button type="button" class="deleteProduct" data-token="{{ csrf_token() }}">Confirm</button>

$('.deleteProduct').on('click', function(e) {
    var inputData = $('#formDeleteProduct').serialize()+"&_method=delete&_token="+$(this).data(token);

    var dataId = $('#btnDeleteProduct').attr('data-id');

    $.ajax({
        url: '{{ url('/admin/products') }}' + '/' + dataId,
        type: 'POST',
        data: inputData,
        success: function( msg ) {
            if ( msg.status === 'success' ) {
                toastr.success( msg.msg );
                setInterval(function() {
                    window.location.reload();
                }, 5900);
            }
        },
        error: function( data ) {
            if ( data.status === 422 ) {
                toastr.error('Cannot delete the category');
            }
        }
    });

    return false;
});
const flashData = $('.flash-data').data('flashdata');
if(flashData){
    Swal.fire({
        title: 'Data '+ flashData,
        text: 'berhasil ditambahkan',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
};

const flashDalete = $('.flash-delete').data('delete');
if(flashDalete){
     Swal.fire({
        title: 'Data '+ flashData,
        text: 'berhasil dihapus',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
};


$('.detail-buku').click(function() {
    const id = $(this).data('id');
    $.ajax({
        url: base_url+"ajax/bookDetail",
        data: {
            id:id
        },
        type: 'POST',
        dataType: 'json',
        async: true,
        success:function(data){
            $.each(data,function(id,kd){
                $('#id_buku').val(data.id);
                $('#kd_detail').val(data.kd);
            });
        }
    });
 });




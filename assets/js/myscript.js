const flashData = $('.flash-data').data('flashdata');
if(flashData){
    Swal.fire({
        title: 'Data '+ flashData,
        text: 'berhasil ditambahkan',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
}
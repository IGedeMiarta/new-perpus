const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal.fire({
        title: 'Data ' + flashData,
        text: 'berhasil ditambahkan',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
};

const flashDalete = $('.flash-delete').data('delete');
if (flashDalete) {
    Swal.fire({
        title: 'Data ' + flashDalete,
        text: 'berhasil dihapus',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
};

const flashUpdate = $('.flash-update').data('update');
if (flashUpdate) {
    Swal.fire({
        title: 'Data ' + flashUpdate,
        text: 'berhasil diupdate',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
};


$('.detail-buku').click(function() {
    const id = $(this).data('id');
    $.ajax({
        url: base_url + "ajax/bookDetail",
        data: {
            id: id
        },
        type: 'POST',
        dataType: 'json',
        async: true,
        success: function(data) {
            $.each(data, function(id, kd) {
                $('#id_buku').val(data.id);
                $('#kd_detail').val(data.kd);
            });
        }
    });
});

$('.edit-petugas').click(function() {
    const id = $(this).data('id');
    $.ajax({
        type: 'POST',
        data: {
            id: id
        },
        dataType: 'JSON',
        url: base_url + "ajax/editPetugas",
        async: true,
        success: function(data) {
            $.each(data, function() {
                $('#e_id').val(data.id_petugas);
                $('#e_nip').val(data.nip);
                $('#e_nama').val(data.nama);
                $('#e_jenkel').val(data.jenkel);
                $('#e_hp').val(data.no_hp);
                $('#e_alamat').val(data.alamat);
            })
        }
    });
});

$('.edit-anggota').click(function() {
    const id = $(this).data('id');
    $.ajax({
        type: 'POST',
        data: {
            id: id
        },
        dataType: 'JSON',
        url: base_url + "ajax/editAnggota",
        async: true,
        success: function(data) {
            $.each(data, function() {
                $('#e_id').val(data.id_anggota);
                $('#e_nip').val(data.nis);
                $('#e_nama').val(data.nama);
                $('#e_jenkel').val(data.jenis_kel);
                $('#e_hp').val(data.no_hp);
                $('#e_alamat').val(data.alamat);
                $('#status').val(data.status);
            })
        }
    });
});

$('.edit-donatur').on('click', function() {
    const id = $(this).data('id');
    $.ajax({
        type: 'POST',
        data: {
            id: id
        },
        dataType: 'JSON',
        url: base_url + "ajax/editDonatur",
        async: true,
        success: function(data) {
            $.each(data, function() {
                $('#e_id').val(data.id_donatur);
                $('#e_nama').val(data.nama_donatur);
                $('#e_jenkel').val(data.jenkel);
                $('#e_hp').val(data.no_hp);
                $('#e_alamat').val(data.alamat);
            })
        }
    })
});


// contoh insert dengan ajax
//  $('#edit_petugas').on('submit',function(){

//      $.ajax({
//         type : 'POST',
//         data : $(this).serialize(),
//         dataType:'JSON',
//         url: base_url+"ajax/updatePetugas",
//         async: true,
//         success:function(data){
//             Swal.fire({
//             title: 'Data Petugas',
//             text: 'berhasil diubah',
//             icon: 'success',
//             confirmButtonText: 'Ok'
//     });
//         }
//      });
//  });
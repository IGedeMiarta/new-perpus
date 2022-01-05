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
const flash_Dalete = $('.flash-delete').data('flashdelete');
if (flashDalete || flash_Dalete) {
    Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
    )
};

const flash_Gagal = $('.flash-gagal').data('gagal');
if (flash_Gagal) {
    Swal.fire(
        'Gagal!',
        'Tidak bisa meminjam buku lebih dari 3 kali.',
        'warning'
    )
};
const flash_perpanjang = $('.flash-perpanjang').data('perpanjang');
if (flash_perpanjang) {
    Swal.fire(
        'Gagal!',
        'Tidak bisa perpanjang buku lebih dari 1 kali.',
        'warning'
    )
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
                $('#e_status').val(data.status);
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
$('.edit-peminjaman').on('click', function() {
    const id = $(this).data('id');
    $.ajax({
        type: 'POST',
        data: {
            id: id
        },
        dataType: 'JSON',
        url: base_url + "ajax/editPeminjaman",
        async: true,
        success: function(data) {
            console.log(data);
            $.each(data, function() {
                $('#e_id').val(data.id_peminjaman);
                $('#e_bk2').val(data.id_buku);
                $('#e_tgl').val(data.tgl_pinjam);
                $('#e_anggota').val(data.id_anggota);
                $('#e_buku').val(data.id_buku);
                $('#e_status').val(1);

            });
        }
    })
});

$('.delete').on('click', function(e) {
        e.preventDefault();
        var getLink = $(this).attr('href');
        console.log('click');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = getLink;
            }
        })
    })
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

function donasi() {
    var jenis = $('#jenis').val();
    if(jenis=='uang'){
        $('#jumlah-donasi').removeClass('d-none');
        // $('#kode-donasi').addClass('d-none');
        $('#judul-donasi').addClass('d-none');
        $('#tahun-donasi').addClass('d-none');
        $('#pengarang-donasi').addClass('d-none');
        $('#penerbit-donasi').addClass('d-none');
        $('#kategori-donasi').addClass('d-none');
        $('#rak-donasi').addClass('d-none');

    }
    if(jenis=='buku'){
        $('#jumlah-donasi').addClass('d-none');
        // $('#kode-donasi').removeClass('d-none');
        $('#judul-donasi').removeClass('d-none');
        $('#tahun-donasi').removeClass('d-none');
        $('#pengarang-donasi').removeClass('d-none');
        $('#penerbit-donasi').removeClass('d-none');
        $('#kategori-donasi').removeClass('d-none');
        $('#rak-donasi').removeClass('d-none');
    }
}
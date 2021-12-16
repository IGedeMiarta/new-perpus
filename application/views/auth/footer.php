<footer class="footer text-center text-sm-left bg-white">
    <div class="container ">
        &copy; 2021 Perpustakaan<span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
</footer>


    <!-- End Log In page -->
    <!-- jQuery  -->
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/waves.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.slimscroll.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>/assets/js/app.js"></script>
    <script text="javascipt">
        var base_url = '<?= base_url() ?>'
    </script>


    <script text="javascipt">
        $('#auth').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'JSON',
                url: base_url + "auth/login",
                async: true,
                success: function(rs) {
                    if(rs.type==='user'){
                        $('#user').html(`<i class="fas fa-exclamation-triangle"></i> user not found`);
                        $('#pass').html('');

                        $('#inp-user').val('');
                        $('#inp-pass').val('');
                    }
                    if(rs.type==='pass'){
                        $('#pass').html(`<i class="fas fa-exclamation-triangle"></i> Wrong Password`);
                        $('#user').html(``);
                        $('#inp-pass').val('');
                    }if(rs.type==='success'){
                        $('#user').html(``);
                        $('#pass').html('');
                        window.location.assign(base_url+rs.data.role);
                        console.log(rs);
                    }
                    
                }
            });
        });

        // $('#regist').on('submit',function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         type: 'POST',
        //         data: $(this).serialize(),
        //         dataType: 'JSON',
        //         url: base_url + "auth/regist",
        //         async: true,
        //         success: function(rs) {
        //             if(rs.type==='user'){
        //                 $('#user').html(`<i class="fas fa-exclamation-triangle"></i> Email already registered`);
        //                 $('#pass').html('');

        //                 $('#inp-user').val('');
        //                 $('#inp-pass').val('');
        //             }
        //             if(rs.type==='pass'){
        //                 $('#pass').html(`<i class="fas fa-exclamation-triangle"></i> Password not match`);
        //                 $('#user').html(``);
        //                 $('#inp-pass').val('');
        //             }if(rs.type==='success'){
        //                 $('#user').html(``);
        //                 $('#pass').html('');
        //                 window.location.assign(base_url+rs.data.role);
        //                 console.log(rs);
        //             }
                    
        //         }
        //     });
        // });
    </script>



</body>

</html>
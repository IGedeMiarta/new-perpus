<footer class="footer text-center text-sm-left">
    <div class="container">
        &copy; 2021 Perpustakaan<span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
</footer>


<!--end footer-->
</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->

<!-- jQuery  -->
<script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
<!-- select 2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
<script>
    $(document).ready(function() {
        $('.select1').select2({
            // theme: "bootstrap"
            width:"100%"
        });
    });
    $(document).ready(function() {
        $('.select2').select2({
            // theme: "bootstrap"
            width:"100%"
        });
    });
    $(document).ready(function() {
        $('.select3').select2({
            // theme: "bootstrap"
            width:"100%"
        });
    });
    $(document).ready(function() {
        $('.select4').select2({
            // theme: "bootstrap"
            width:"100%"
        });
    });
</script>

<script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/js/metisMenu.min.js"></script>
<script src="<?= base_url() ?>/assets/js/waves.min.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.slimscroll.min.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
Buttons examples
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/pages/jquery.datatable.init.js"></script>

<!-- base_url on .js -->
<script text="javascipt">
    var base_url = '<?= base_url() ?>'
</script>



<!-- sweetalert -->
<script src="<?= base_url('assets/sweetalert/') ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/js/myscript.js') ?>"></script>
<!-- App js -->
<script src="<?= base_url() ?>/assets/js/app.js"></script>

</body>

</html>
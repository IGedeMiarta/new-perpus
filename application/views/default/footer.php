<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<script type="text/javascript">
    $('.edit-user').click(function() {
        const id = $(this).data('id');

        $.ajax({
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'JSON',
            async: true,
            url: "<?= base_url('ajax/edit_user') ?>",
            success: function(data) {
                $.each(data, function(id, email, name, address, phone) {
                    $("#id").val(data.id);
                    $("#email").val(data.email);
                    $("#name").val(data.name);
                    $("#address").val(data.address);
                    $("#phone").val(data.phone);
                });
            }
        });
    });
    $('.edit-edu').click(function() {
        const id = $(this).data('id');

        $.ajax({
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'JSON',
            async: true,
            url: "<?= base_url('ajax/edit_edu') ?>",
            success: function(data) {
                $.each(data, function(id, email, name, address, phone) {
                    $("#id").val(data.id_edu);
                    $("#name").val(data.name);
                    $("#level").val(data.level);
                    $("#start").val(data.start_date);
                    $("#end").val(data.end_date);
                });
            }
        });
    });
    $('.edit-empl').click(function() {
        const id = $(this).data('id');

        $.ajax({
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'JSON',
            async: true,
            url: "<?= base_url('ajax/edit_empl') ?>",
            success: function(data) {
                $.each(data, function(id, email, employment_name, level, company, start_date, end_date) {
                    $("#id").val(data.id_emp);
                    $("#name").val(data.employment_name);
                    $("#level").val(data.level);
                    $("#company").val(data.company);
                    $("#start").val(data.start_date);
                    $("#end").val(data.end_date);
                });
            }
        });
    });
</script>


</body>

</html>
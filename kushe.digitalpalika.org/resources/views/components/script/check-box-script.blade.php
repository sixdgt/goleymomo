<script>
    $('#{{$id}}click').click(function(e) {
        if ($(this).is(':checked')) {
            $('#{{$id}}').val(1);
        } else {
            $('#{{$id}}').val(0);
        }
    });
</script>

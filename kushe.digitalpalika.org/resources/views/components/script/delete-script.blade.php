<script>
    function del(id) {
        Swal.fire({
            title: 'चेतावनी!!!!!!',
            text: 'के तपाइँ यसलाई मेटाउन निश्चित हुनुहुन्छ? एक पटक मेटाउन पूर्ववत गर्न सकिँदैन।',

            showCancelButton: true,
            confirmButtonText: 'Delete',

        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var data = {
                    id: id,
                    _token: "{{ csrf_token() }}",
                }
                $.ajax({
                    type: "delete",
                    url: "{{ $route }}" + "/" + id,
                    data: data,
                    success: function(response) {
                        getData();
                        if (response.status == 200) {

                            Swal.fire(response.message, '', 'success')
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            } else if (result.isDenied) {
                Swal.fire('Deletion was Cancel', '', 'info')
            }
        })

    }
</script>

@extends('yojana.index')

@section('yojana-content')
    <section id="chalani-content" class="mt-2">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="me-auto">योजनाको किसिम</h5>
                    <a href="{{ route('yojana-kissim.create') }}" class="btn_palika" id="add-new"><i
                            class="fas fa-plus-square"></i> नयाँ प्रविष्टि</a>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="d-flex justify-content-between">
                        {{-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">दर्ता No.</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div> --}}

                        {{-- <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">कोड</label>
                            <input type="text" class="form-control" id="code" placeholder="कोड">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">नाम</label>
                            <input type="text" class="form-control" placeholder="नाम" id="name">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">स्थिति:</label>
                            <input type="text" class="form-control" id="situation" aria-describedby="emailHelp"
                                placeholder="स्थिति."> --}}
                        {{-- <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select> --}}
                    </div>
            </div>
            </form>
            <div class="container-fluid" style="overflow-x: scroll;">
                <table class="table table-hover chalani-data-table">
                    <thead>
                        <tr>
                            <th>त्र .स</th>
                            <th>कोड</th>
                            <th>पुरा नाम </th>
                            <th>नाम</th>
                            <th>माथिल्लो समूह</th>
                            <th>वीवरण </th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>
@endsection
@section('custom-script')
    <script>
        @if (session('success'))
            swal.fire("Success", "{{ session('success') }}", "success");
        @endif

        @if (session('error'))
            swal.fire("Error", "Server Error!!!!!!!Please contact Devloper team.", "error");
        @endif
        getData()
        function getData() {
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var table = $('.chalani-data-table').DataTable({
                    clear: true,
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('yojana-kissim.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'code',
                            name: 'code'
                        },
                        {
                            data: 'full_name',
                            name: 'full_name'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: "upper_group",
                            name: "upper_group"
                        },
                        {
                            data: 'details',
                            name: 'details',
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });

            });
        }

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
                        url: "{{ route('yojana-kissim.destroy', '') }}" + "/" + id,
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
@endsection

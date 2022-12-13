@extends('layouts.main')
@section('title')
    बिप्पन्न नागरिक आबेदन
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('sifaris.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                <span class="card-title"> बृद्ध भत्ता</span>
                <a class="btn_palika float-end" href="{{ route('briddha-bhatta.create') }}">
                    <i class="fas fa-plus-square"></i> थप्नुहोस्
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <label for="exampleInputPassword1" class="form-label text-center">सिफारिस नं.</label>
                        <input type="text" class="form-control text-center" id="sifaris_no" placeholder="सिफारिस नं.">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="exampleInputPassword1" class="form-label text-center">नागरिकता नं.</label>
                        <input type="text" class="form-control text-center np-input-text" id="citizenship_no" placeholder="नागरिकता नं.">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="exampleInputPassword1" class="form-label text-center">निवेदकको नाम</label>
                        <input type="text" class="form-control text-center np-input-text" id="nibedak_name" placeholder="निवेदकको नाम">
                    </div>

                </div>
                <div style="margin-top: 15px">
                    <table class="table briddha-bhatta-data-table">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>नाम</th>
                                <th>ठेगाना</th>
                                <th>नागरिकता नम्बर</th>
                                <th>सम्पर्क नम्बर</th>
                                <th>दर्ता मिति</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="data_table_body">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('custom-script')
    <script>
        @if (session('success'))
            swal.fire("Success", "{{ session('success') }}", "success");
        @endif
            getData()


        function getData() {
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var table = $('.briddha-bhatta-data-table').DataTable({
                    clear: true,
                    destroy: true,
                    processing: true,
                    serverSide: true,

                    ajax: {
                        url: "{{ route('briddha-bhatta.index') }}",
                        type: 'GET',
                        data: function(d) {
                            d.sifaris_no = $('#sifaris_no').val();
                            d.citizenship_no = $('#citizenship_no').val();
                            d.nibedak_name = $('#nibedak_name').val();

                        }
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },

                        {
                            data: 'applicant_name_bibaran',
                            name: 'applicant_name_bibaran'
                        },
                        {
                            data: 'applicant_address_bibaran',
                            name: 'applicant_address_bibaran',
                        },
                        {
                            data: 'applicant_citizenship_number',
                            name: 'applicant_citizenship_number',
                        },
                        {
                            data: 'applicant_phone_number',
                            name: 'applicant_phone_number',
                        },
                        {
                            data: 'registered_date',
                            name: 'registered_date',
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }

                    ]
                });

                $('#citizenship_no').keyup(function(e) {
                    table.draw()
                });
                $('#sifaris_no').keyup(function(e) {
                    table.draw()
                });
                $('#nibedak_name').keyup(function(e) {
                    table.draw()
                });


                $(document).on('click', '.delete-nibedan', function() {
                    var id = $(this).data('id');
                    Swal.fire({
                        title: 'Warning',
                        text: 'के तपाइँ यसलाई मेटाउन निश्चित हुनुहुन्छ? एकपटक मेटाइएपछि अन्डू गर्न सकिँदैन।',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Delete गर्नुहोस्',
                        denyButtonText: `Delete नगर्नुहोस्`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            var data = {
                                id: id,
                                _token: "{{ csrf_token() }}",
                            }
                            $.ajax({
                                type: "delete",
                                url: "{{ route('briddha-bhatta.destroy', '') }}" + "/" + id,
                                data: data,
                                success: function(response) {
                                    $('.chalani-data-table').DataTable().ajax.reload();
                                    if (response.status == 200) {
                                        Swal.fire(response.message, '', 'success')
                                        table.draw();
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
                })

            });
        }

        function deleteNibedan(id) {
            Swal.fire({
                title: 'Warning',
                text: 'Are you sure you want to delete it? Once delete cannot be undo.',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                denyButtonText: `Don't Delete`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var data = {
                        id: id,
                        _token: "{{ csrf_token() }}",
                    }
                    $.ajax({
                        type: "delete",
                        url: "{{ route('briddha-bhatta.destroy', '') }}" + "/" + id,
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

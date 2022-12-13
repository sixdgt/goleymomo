@extends('layouts.main')
@section('title')
    बिप्पन्न नागरिक आबेदन
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                बृद्ध भत्ता
                <a href="{{ route('briddha-bhatta.create') }}">
                    <button class="btn btn-info float-end" type="button" id="bridha-add">थप्नुहोस्<i
                            class="fa fa-hand-o-right"></i></button>
                </a>
            </div>
            <div class="card-body">
                <div class="error">
                    <ul id="errors"></ul>
                </div>
                <div style="margin-top: 15px">
                    <table class="table briddha-bhatta-data-table">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>पदनाम</th>
                                <th>नाम</th>
                                <th>श्रेणी</th>
                                <th>नागरिकता नम्बर</th>
                                <th>सम्पर्क नम्बर</th>
                                <th>विधवा पत्नी नाम</th>
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
                    ajax: "{{ route('briddha-bhatta.index') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'designation',
                            name: 'designation'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'category',
                            name: 'category'
                        },
                        {
                            data: 'citizenship_number',
                            name: 'citizenship_number',
                        },
                        {
                            data: 'contact_number',
                            name: 'contact_number',
                        }, {
                            data: 'widow_spouse_name',
                            name: 'widow_spouse_name',
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

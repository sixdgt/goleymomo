@extends('layouts.main')
@section('title')
    पत्रको किसिम
@endsection
@section('custom-css')
    <style>
        .data_table_body {
            --Font-color: red;
            font-size: 20px !important;
        }

    </style>
@endsection

@section('back_url')
    {{ route('settings.index') }}
@endsection
@section('back_page_title')
    सेटिङ्ग
@endsection

@section('content')
    {{-- <div class="container-fluid"> --}}
    {{-- <div class="card"> --}}
    {{-- <div class="card-header"> --}}
    {{-- पत्रको किसिम थप्नुहोस् --}}

    {{-- </div> --}}
    {{-- <div class="card-body"> --}}
    {{-- <form> --}}
    {{-- <div class="input-group"> --}}
    {{-- <input type="text" class="form-control" placeholder="पत्रको किसिम" aria-label="पत्रको किसिम" aria-describedby="patra-add-kisim"> --}}
    {{-- <button class="btn btn-outline-info" type="button" id="patra-add-kisim">थप्नुहोस्<i class="fa fa-hand-o-right"></i></button> --}}
    {{-- </div> --}}
    {{-- </form> --}}
    {{-- </div> --}}

    {{-- </div> --}}
    {{-- </div> --}}

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">


                <a href="{{ route('settings.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                <span class="card-title" id="wadaModalLabel">पत्रको किसिम</span>

            </div>
            <div class="card-body">
                <form>
                    <div class="input-group">
                        <input type="text" id="patraType" class="form-control" placeholder="पत्रको किसिम"
                            aria-label="पत्रको किसिम" aria-describedby="patra-add-kisim">
                        <button class="btn btn-outline-info" type="button" id="patra-add-kisim">थप्नुहोस्<i
                                class="fa fa-hand-o-right"></i></button>
                    </div>
                </form>
                <div class="error">
                    <ul id="errors"></ul>
                </div>
                <hr>

                <div style="margin-top: 15px">
                    <table class="table patra-kisim-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>पत्रको किसिम</th>
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

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">पत्र किसिम अद्यावधिक</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="updatedPatraId">
                    <label for="UpdatedPatra">पत्र किसिम </label>
                    <input type="text" class="form-control" id="updatedPatra" aria-describedby="emailHelp"
                        placeholder="पत्र किसिम  लेखनु होस्।">
                </div>
                <div class="modalerror">
                    <ul id="modalerrors"></ul>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn_palika bg-danger" data-bs-dismiss="modal">रद्ध गर्नुहोस</button>
                    <button type="button" onclick="update()" id="updatePatra" class="btn_palika">अपडेट गर्नुहोस् </button>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('custom-script')
    <script>
        function update() {
            var id = $('#updatedPatraId').val();
            var name = $('#updatedPatra').val();
            var data = {
                id: id,
                updatedPatra: name,
                _token: "{{ csrf_token() }}",
            }
            console.log(data);
            $.ajax({
                type: "patch",
                url: "{{ route('patra-kisim.update', '') }}" + "/" + id,
                data: data,
                success: function(response) {
                    getData();
                    if (response.status == 200) {
                        $('#editModal').modal('hide')
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        if (response.status == 400) {

                            $('.modalerror').addClass('alert alert-danger')
                            console.log(response.errors);
                            $('#modalerrors').html('');
                            $.each(response.errors, function(key, error) {
                                $('#modalerrors').append('<li>' + error + '</li>');
                            });
                        }
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
        }

        function editPatra(id) {

            $.ajax({
                type: "get",
                url: "{{ route('patra-kisim.destroy', '') }}" + "/" + id + "/edit",
                success: function(response) {
                    getData();
                    console.log(response.data[0]);
                    $('#updatedPatra').val(response.data[0].type);
                    $('#updatedPatraId').val(response.data[0].id);
                }
            });
        }

        function deletePatra(id) {
            Swal.fire({
                title: 'Warning',

                text: 'के तपाइँ यसलाई मेटाउन निश्चित हुनुहुन्छ? एक पटक मेटाइ पुन: प्राप्त गर्न सकिँदैन।',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete गर्नुहोस्',
                denyButtonText: `Delete नगर्नुहोस्`,

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var data = {
                        id: $('#deletePatra').attr('data-id'),
                        _token: "{{ csrf_token() }}",
                    }
                    console.log(id);
                    $.ajax({
                        type: "delete",
                        url: "{{ route('patra-kisim.destroy', '') }}" + "/" + id,
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
        // for adding new member
        $(document).ready(function() {
            $('#patra-add-kisim').click(function(e) {
                e.preventDefault();

                var data = {
                    type: $('#patraType').val(),
                    _token: "{{ csrf_token() }}",
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('patra-kisim.store') }}",
                    data: data,
                    success: function(response) {
                        getData();
                        if (response.status == 200) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            console.log(response);

                            if (response.status == 400) {

                                $('.error').addClass('alert alert-danger')
                                console.log(response.errors);
                                $('#errors').html('');
                                $.each(response.errors, function(key, error) {
                                    $('#errors').append('<li>' + error + '</li>');
                                });
                            }
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    },

                });
            });
        });

        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(document).ready(function() {
            $('#dataTable').DataTable();
            getData()

        });

        function getData() {
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var table = $('.patra-kisim-data-table').DataTable({
                    clear: true,
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('patra-kisim.index') }}",
                    columns: [{
                            data: 'no',
                            name: 'no'
                        },
                        {
                            data: 'patra_type',
                            name: 'patra_type'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

            });

        }
    </script>
@endsection

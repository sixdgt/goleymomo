@extends('layouts.main')
@section('title')
    सदस्य
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
    सदस्य
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">

                <a href="{{ route('settings.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                <span class="card-title" id="wadaModalLabel">सदस्य</span>

            </div>
            <div class="card-body">
                <h4 class="text-center m-4">सदस्य को नाम लेखनु होस्। </h4>
                <form>
                    <div class="input-group px-5 py-1">
                        <input type="text" id="sadasyaKoNam" class="form-control input-lg" placeholder="सदस्यको नाम"
                            aria-label="सदस्यको नाम" aria-describedby="">
                        <input type="hidden" id="sadasyaKoNamKoId">
                        <button class="btn btn-outline-info mx-1 " type="button" id="patra-add-kisim">थप्नुहोस्<i
                                class="fa fa-hand-o-right"></i></button>
                    </div>
                    <div class="position-absolute px-5" id="suggestion">

                    </div>
                    <div class="error">
                        <ul id="errors"></ul>
                    </div>
                    <hr>
                    <h4 class="text-center my-2">सदस्यहरु।</h4>
                </form>
                <hr>
                <div style="margin-top: 15px;">
                    <table class="table data_table sadasya-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>सदस्य</th>
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">सदस्य अद्यावधिक</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="updatedSadasyaNamId">
                    <label for="UpdatedSadasyaNam">सदस्य को नाम लेखनु होस्।</label>
                    <input type="text" class="form-control" id="updatedSadasyaNam" aria-describedby="emailHelp"
                        placeholder="सदस्य को नाम लेखनु होस्।">
                </div>
                <div class="modalerror">
                    <ul id="modalerrors"></ul>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn_palika bg-danger" data-bs-dismiss="modal">रद्ध गर्नुहोस</button>
                    <button type="button" onclick="update()" id="updateSadasya" class="btn_palika">अपडेट गर्नुहोस्</button>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('custom-script')
    <script>
        $('#sadasyaKoNam').keyup(function(e) {

            var query = $('#sadasyaKoNam').val();
            if (query != '') {
                $.ajax({
                    type: "get",
                    url: "{{ route('sadasya.show', '') }}" + "/" + query,
                    success: function(response) {
                        console.log(response);
                        $('#suggestion').fadeIn();
                        $('#suggestion').html(response);
                    }
                });
            } else {
                console.log('faseout');
                $('#suggestion').fadeOut();

            }

        });

        $(document).on('click', 'li', function() {
            $('#sadasyaKoNam').val($(this).text());
            $('#sadasyaKoNamKoId').val(this.value);
            $('#suggestion').fadeOut();

        });


        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        getData()

        function getData() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.sadasya-data-table').DataTable({
                clear: true,
                destroy: true,
                processing: true,
                oLanguage: {
                    sProcessing: '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>'
                },
                serverSide: true,
                ajax: "{{ route('sadasya.index') }}",
                columns: [{
                        data: 'no',
                        name: 'no'
                    },
                    {
                        data: 'sadasya_name',
                        name: 'sadasya_name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        }
// for adding new member
        $(document).ready(function() {
            $('#patra-add-kisim').click(function(e) {
                e.preventDefault();

                var data = {
                    sadasyaKoNam: $('#sadasyaKoNam').val(),
                    sadasyaKoNamKoId: $('#sadasyaKoNamKoId').val(),
                    _token: "{{ csrf_token() }}",
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('sadasya.store') }}",
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
        // forediting
        function editSadasya(id) {

            $.ajax({
                type: "get",
                url: "{{ route('sadasya.destroy', '') }}" + "/" + id + "/edit",
                success: function(response) {
                    getData();
                    console.log(response);
                    $('#updatedSadasyaNam').val(response.data[0].name);
                    $('#updatedSadasyaNamId').val(response.data[0].id);
                }
            });
        }

        function update() {
            var id = $('#updatedSadasyaNamId').val();
            var name = $('#updatedSadasyaNam').val();
            var data = {
                id: id,
                updatedSadasyaKoNam: name,
                _token: "{{ csrf_token() }}",
            }

            $.ajax({
                type: "patch",
                url: "{{ route('sadasya.update', '') }}" + "/" + id,
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
        // for deleting
        function deleteSadasya(id) {
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
                        id: $('#deleteSadasya').attr('data-id'),
                        _token: "{{ csrf_token() }}",
                    }
                    $.ajax({
                        type: "delete",
                        url: "{{ route('sadasya.destroy', '') }}" + "/" + id,
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

@extends('layouts.main')
@section('title')
    साखा
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
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">


                <a href="{{ route('settings.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                <span class="card-title" id="wadaModalLabel">साखाहरु</span>

            </div>
            <div class="card-body">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" id="sakhaName" placeholder="साखा" aria-label="साखा"
                               aria-describedby="sakha-add-kisim">
                        <button class="btn btn-outline-info" type="button" id="sakha-add">थप्नुहोस्<i
                                    class="fa fa-hand-o-right"></i></button>
                    </div>
                </form>
                <div class="error">
                    <ul id="errors"></ul>
                </div>
                <div style="margin-top: 15px">
                    <table class="table sakha-data-table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>साखा</th>
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
    <div class="modal fade bd-example-modal-lg" id="sakhaModal" tabindex="-1" role="dialog"
         aria-labelledby="sakhaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content btns">
                <div class="modal-header">
                    <h5 class="modal-title" id="pratinidhiModalLabel">साखा</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="साखा" aria-label="साखा"
                                   aria-describedby="patra-add-kisim">
                            <button class="btn btn-outline-info" type="button" id="">Update<i
                                        class="fa fa-hand-o-right"></i></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">साखा अद्यावधिक</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="updatedSakhaId">
                    <label for="UpdatedSakha">साखा </label>
                    <input type="text" class="form-control" id="updatedSakha" aria-describedby="emailHelp"
                           placeholder="पत्र किसिम  लेखनु होस्।">
                </div>
                <div class="modalerror">
                    <ul id="modalerrors"></ul>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn_palika bg-danger" data-bs-dismiss="modal">रद्ध गर्नुहोस</button>
                    <button type="button" onclick="update()" id="updatePatra" class="btn_palika">अपडेट गर्नुहोस्</button>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('custom-script')
    <script>
        function update() {
            var id = $('#updatedSakhaId').val();
            var name = $('#updatedSakha').val();
            var data = {
                id: id,
                updatedSakha: name,
                _token: "{{ csrf_token() }}",
            }
            console.log(data);
            $.ajax({
                type: "patch",
                url: "{{ route('sakha.update', '') }}" + "/" + id,
                data: data,
                success: function(response) {
                    getData();
                    if (response.status == 200) {
                        $('#editModal').modal('hide')
                        Swal.fire({

                            position: 'center',

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

        function editSakha(id) {

            $.ajax({
                type: "get",
                url: "{{ route('sakha.destroy', '') }}" + "/" + id + "/edit",
                success: function(response) {
                    getData();
                    console.log(response.data[0]);
                    $('#updatedSakha').val(response.data.name);
                    $('#updatedSakhaId').val(response.data.id);
                }
            });
        }

        function deleteSakha(id) {
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
                        id: $('#deleteSakha').attr('data-id'),
                        _token: "{{ csrf_token() }}",
                    }
                    console.log(id);
                    $.ajax({
                        type: "delete",
                        url: "{{ route('sakha.destroy', '') }}" + "/" + id,
                        data: data,
                        success: function(response) {
                            getData();
                            if (response.status == 200) {

                                Swal.fire(response.message, '', 'success')
                            } else {
                                Swal.fire({

                                    position: 'center',

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
            $('#sakha-add').click(function(e) {
                e.preventDefault();

                var data = {
                    name: $('#sakhaName').val(),
                    _token: "{{ csrf_token() }}",
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('sakha.store') }}",
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
            getData();
        });

        function getData() {

            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var table = $('.sakha-data-table').DataTable({
                    clear: true,
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('sakha.index') }}",
                    columns: [{
                        data: 'no',
                        name: 'no'
                    },
                        {
                            data: 'sakha_name',
                            name: 'sakha_name'
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

@extends('layouts.main')

@section('title')
डिजिटल पालिका | वडा
@endsection

@section('custom-css')
<style>
    .btns {
        font-size: 1.2rem !important;
        border-radius: 0px !important;
    }
</style>
@endsection
@section('content')



            <div class="card">
                <div class="card-header d-flex justify-content-between">

                    <a href="{{ route('settings.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                    <span class="card-title" id="wadaModalLabel">वडाको विवरन</span>
                    <a href="{{route('ward.create')}}" class="btn_palika create-ward" data-bs-toggle="modal" data-bs-target="#wardModal" id="" data-target="#wardModal"> + थप सिर्जना गर्नुहोस्</a>


                </div>

                <div class="card-body">
                    <table class="table ward-data-table" style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th>क्र.म.</th>
                                <th>वडाको नाम</th>
                                <th>विवरण</th>
                                <th>थेगना</th>
                                <th>सम्पर्क</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>





            <!-- Modal for ward create-->


            <div class="modal fade" id="wardModal" tabindex="-1" role="dialog" aria-labelledby="editWardModel" aria-hidden="true">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="wadaModalLabel">वडाको विवरन</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div id="div-load-modal-body">

                        </div>

                    </div>
                </div>
            </div>


@endsection
@section('custom-script')

    <script>





        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            get_datatable_data();
            function get_datatable_data() {
                var table = $('.ward-data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('ward.index') }}",
                    "pageLength": 6,
                    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'dp_ward_name', name: 'dp_ward_name'},
                        {data: 'dp_ward_description', name: 'dp_ward_description'},
                        {data: 'dp_ward_address', name: 'dp_ward_address'},
                        {data: 'dp_ward_contact', name: 'dp_ward_contact'},
                        {data: 'actions', name: 'actions', orderable: true, searchable: true}

                    ]
                });
            }

            //delete ward
            $(document).on('click', '.delete-ward', function() {
                Swal.fire({
                    title: 'Warning',

                    text: 'के तपाइँ यसलाई मेटाउन निश्चित हुनुहुन्छ? एक पटक मेटाइ पुन: प्राप्त गर्न सकिँदैन।',

                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Don't Delete`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id= $(this).data('id');
                        // alert($(this).data('id'));
                        var data={
                            'id':id,
                            _token: "{{ csrf_token() }}",
                        }
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('ward.destroy','')}}"+ "/" + id,
                            data: data,
                            success: function(response) {

                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $('.ward-data-table').DataTable().ajax.reload();
                            },
                            error:function (err) {
                                console.log(err.message);
                            }
                        })
                    }else if (result.isDenied) {
                        Swal.fire('Deletion was Cancel', '', 'info')
                    }
                })

            })




            //loading update form
            $(document).on('click', '.edit-ward', function() {
                $('#div-load-modal-body').load("{{ route('ward.show', '') }}" + "/" + $(this).data('id')+'/edit',function () {

                })
            });

            //loading create form
            $(document).on('click', '.create-ward', function() {
                $('#div-load-modal-body').load("{{ route('ward.create', '') }}",function () {

                })
            });
            //create ward
            $(document).on('click','#btnCreateWard',function (e) {

                e.preventDefault();

                var data = {
                    'dp_ward_name': $('#dp_ward_name').val(),
                    'dp_ward_description': $('#dp_ward_description').val(),
                    'dp_ward_address': $('#dp_ward_address').val(),
                    'dp_ward_contact': $('#dp_ward_contact').val(),
                    _token: "{{ csrf_token() }}",
                }
                console.log(data)
                $.ajax({
                    type: "POST",
                    url: "{{ route('ward.store') }}",
                    data: data,
                    success: function(response) {

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        $('.ward-data-table').DataTable().ajax.reload();
                    },
                    error:function (err) {
                        if(err.status==422)
                        {
                            // console.log(err.responseJSON.errors);
                            $.each(err.responseJSON.errors,function(key,error){
                                // console.log(error)
                                $('#error-'+key).html(error)
                            })
                        }
                    }

                });
            });


            //update ward
            $(document).on('click','#btnUpdateWard',function (e) {
                e.preventDefault();
                var id=$(this).data('id');
                var data = {
                    'dp_ward_name': $('#dp_ward_name').val(),
                    'dp_ward_description': $('#dp_ward_description').val(),
                    'dp_ward_address': $('#dp_ward_address').val(),
                    'dp_ward_contact': $('#dp_ward_contact').val(),
                    _token: "{{ csrf_token() }}",
                }
                console.log(data)
                $.ajax({
                    type: "patch",
                    url: "{{ route('ward.update','')}}" + "/" + id,
                    data: data,
                    success: function(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('.ward-data-table').DataTable().ajax.reload();
                    },
                    error:function (err) {
                        if(err.status==422)
                        {
                            // console.log(err.responseJSON.errors);
                            $.each(err.responseJSON.errors,function(key,error){
                                // console.log(error)
                                $('#error-'+key).html(error)
                            })
                        }
                    }

                });
            });



            $('.form-control').click(function () {
                // alert('dfasdf')
                $('.field-error').html('');
            })
        });
    </script>
@endsection


@extends('layouts.main')

@section('title')
डिजिटल पालिका | प्रतिनिधी
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
{{--<div class="d-flex justify-content-between">--}}
{{--    <div class="nagarik-heading">--}}
{{--        <p><a href="{{route('settings.index')}}"><i class="fas fa-arrow-left arrow"></i>प्रतिनिधी</a></p>--}}
{{--    </div>--}}
{{--</div>--}}
<section style="padding-top:0px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">


                    <a href="{{ route('settings.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                    <span class="card-title" id="wadaModalLabel">प्रतिनिधी</span>

{{--                        <a type="button" href="#" id="pratinidhiCreateBtn" class="btn_palika" data-bs-toggle="modal" data-bs-target="#pratinidhiModal">+ थप सिर्जना गर्नुहोस्</a>--}}
                    <a href="{{route('pratinidhi.create')}}" class="btn_palika">+ थप सिर्जना गर्नुहोस्</a>


                </div>

                <div class="card-body">
                    <table class="table pratinidhi-data-table" id="dpTable">
                        <thead>
                            <tr>

                                <th><input type="checkbox"></th>
                                <th>क्र.म.</th>
                                <th>पहिलो नाम</th>
                                <th>बिचको नाम</th>
                                <th>थर</th>
                                <th>पद</th>
                                <th>पिङ्ग</th>
                                <th>जन्म मिति</th>
                                <th>सम्पर्क</th>
                                <th>फोटो</th>
                                <th>राष्ट्रिय परिचय पत्र</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
{{--                            <tr>--}}
{{--                                <td id="checkbox"><input type="checkbox" id="checkbox"></td>--}}
{{--                                <td> dp_pratinidhi_number </td>--}}
{{--                                <td>dp_pratinidhi_fullname </td>--}}
{{--                                <td> dp_pratinidhi_post </td>--}}
{{--                                <td>dp_pratinidhi_contact </td>--}}
{{--                                <td> dp_pratinidhi_photo </td>--}}
{{--                                <td>--}}
{{--                                    <a href="" class="btn btn-primary btn-sm">Edit</a>--}}
{{--                                    <a href="" class="btn btn-danger btn-sm">Delete</a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="pratinidhiModal" tabindex="-1" role="dialog" aria-labelledby="pratinidhiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content btns">
          <div class="modal-header">
            <h5 class="modal-title" id="pratinidhiModalLabel">प्रतिनिधी</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="pratinidhi-model-body"></div>
    </div>
  </div>
</div>
@endsection
@section('custom-script')
    <script>
        $(document).ready(function (){
            $(document).on('click','#pratinidhiCreateBtn',function () {
                $('.pratinidhi-model-body').load('{{route('pratinidhi.create')}}',function () {

                })
            })

            $(document).on('click','#pratinidhiEditBtn',function () {
                $('.pratinidhi-model-body').load("{{ route('pratinidhi.update', '') }}" + "/" + $(this).data('id')+'/edit',function () {

                })
            })



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var table = $('.pratinidhi-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pratinidhi.index') }}",
                "pageLength":6,
                "aLengthMenu":[[5,10,25,50,-1], [5,10,25,50,"All"]],
                columns: [
                    {data: 'dp_pratinidhi_checkbox', render: function (data, type, row, meta)
                        {
                            return '<input type="checkbox">';
                            // return '<a href="' + data + '" target="_blank">View <a/>';
                        }
                    },
                    {data: 'id', name: 'id'},
                    {data: 'dp_pratinidhi_first_name', name: 'dp_pratinidhi_fist_name'},
                    {data: 'dp_pratinidhi_middle_name', name: 'dp_pratinidhi_middle_name'},
                    {data: 'dp_pratinidhi_last_name', name: 'dp_pratinidhi_last_name'},
                    {data: 'dp_pratinidhi_designation', name: 'dp_pratinidhi_designation'},
                    {data: 'dp_pratinidhi_gender', name:'dp_pratinidhi_gender'},
                    {data: 'dp_pratinidhi_dob', name: 'dp_pratinidhi_dob'},
                    {data: 'dp_pratinidhi_contact', name: 'dp_pratinidhi_contact'},
                    {data: 'dp_pratinidhi_profile_pic', render: function (data, type, row, meta) {
                            return '<a href="{{url('/')}}/' + data + '" target="_blank"">View <a/>';
                        }
                    },
                    {data: 'dp_pratinidhi_parichayapatra_file', render: function (data, type, row, meta) {
                            return '<a href="{{url('/')}}/' + data + '" target="_blank"">View <a/>';
                        }
                    },
                    {data: 'actions', name: 'actions', orderable: true, searchable: true}
                ]
            });


        });


        $(document).on('click','#pratinidhiDeleteBtn',function () {
            var id=$(this).data('id');
            Swal.fire({
                title: 'Warning',

                text: 'के तपाइँ यसलाई मेटाउन निश्चित हुनुहुन्छ? एक पटक मेटाइ पुन: प्राप्त गर्न सकिँदैन।',

                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                denyButtonText: `Don't Delete`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var data = {
                        id: $('#deleteSadasya').attr('data-id'),
                        _token: "{{ csrf_token() }}",
                    }
                    $.ajax({
                        type: "delete",
                        url: "{{ route('pratinidhi.destroy', '') }}" + "/" + id,
                        data: data,
                        success: function(response) {
                            $('.pratinidhi-data-table').DataTable().ajax.reload();
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
        })
    </script>
@endsection












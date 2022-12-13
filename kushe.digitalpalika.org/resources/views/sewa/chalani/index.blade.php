@extends('layouts.main')

@section('title')
    चलानी
@endsection
@section('custom-css')
@endsection

@section('back_url')
    {{ route('sewa.index') }}
@endsection
@section('back_page_title')
    सेवा
@endsection
@section('content')
    <style>





    </style>

    <section id="chalani-content" class="mt-2">
        <div class="card">
            <div class="card-header">

                    <a href="{{ route('sewa.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                    <span class="card-title">चलानी</span>


                    <a href="{{ route('chalani.create') }}" style="float:right;" class="btn_palika" id="add-new"><i class="fas fa-plus-square"></i> नयाँ चलानी</a>

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

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">सुरु मिति</label>
                            <input type="text" class="form-control" id="start-np-date" placeholder="सुरु मिति">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">अन्तिम मिति</label>
                            <input type="text" class="form-control" placeholder="अन्तिम मिति" id="end-np-date">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">चलानी No.</label>
                            <input type="text" class="form-control" id="chalaniNumber" aria-describedby="emailHelp"

                                value="" placeholder="चलानी No.">
{{--                            @if (session('chalaniNumber')){{session('chalaniNumber')}} @endif--}}

                            {{-- <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select> --}}
                        </div>

                        <div class="mb-3"></div>


                    </div>
                </form>

                <div class="container-fluid" style="overflow-x: scroll;">
                    <table class="table table-hover chalani-data-table">
                        <thead>
                            <tr>
                                <th>चलानी नम्बर</th>

                                <th>चलानी मिती</th>

                                <th>बिषय</th>
                                <th>पत्रको किसिम</th>
                                <th>पत्र बुज्ने शाखा</th>
                                <th>कार्यालय वा व्यक्तिको नाम</th>
                                <th>स्क्यान फाइल</th>
                                <th>कैफियत</th>
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
        $('#add-new').click(function() {
            $('#chalani-content').hide();
            $('#chalani-add-form').show();
        });

        $('#btn-back').click(function() {
            $('#chalani-content').show();
            $('#chalani-add-form').hide();
        });

        $(document).ready(function() {

            @if(\Illuminate\Support\Facades\Session::has('message'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '',
                text: '{{\Illuminate\Support\Facades\Session::get('message')}}',
                showConfirmButton: false,
                timer: 1500
            })
            @endif


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var table = $('.chalani-data-table').DataTable({

                "drawCallback": function () {
                    @if (session('chalaniNumber'))

                    $('table tr').each(function(key,value) {

                        if(!key==0)
                        {

                            var chalaniNumber = $(this).find("td").eq(0).html();
                            var session_chalaniNumber="{{session('chalaniNumber')}}";
                            // alert(dartaNumber+','+session_dartaNumber);
                            if(chalaniNumber==session_chalaniNumber)
                            {

                                // $(this).find("td").eq(0).css( "background-color", "skyblue" );
                                $('table tr:eq('+key+')').css( "background-color", "skyblue" );
                                return false;
                            }
                        }
                    });

                    @endif

                },

                processing: true,
                serverSide: true,

                {{--ajax: "{{ route('chalani.index') }}",--}}
                {{--"pageLength":6,--}}
                {{--"aLengthMenu":[[5,10,25,50,-1], [5,10,25,50,"All"]],--}}
                {{--columns: [--}}
                {{--    {data: 'dp_chalani_number', name: 'dp_chalani_number'},--}}
                {{--    {data: 'dp_chalani_date', name: 'dp_chalani_date'},--}}
                {{--    {data: 'dp_chalani_subject', name: 'dp_chalani_subject'},--}}
                {{--    {data: 'dp_chalani_letter_type_name', name: 'dp_chalani_letter_type_name'},--}}
                {{--    {data: 'dp_chalani_letter_department', name: 'dp_chalani_letter_department'},--}}
                {{--    {data: 'dp_chalani_letter_to', name: 'dp_chalani_letter_to'},--}}
                {{--    {data: 'dp_chalani_file', render: function (data, type, row, meta) {--}}
                {{--            return '<a href="{{url('/')}}/' + data + '" target="_blank"">View <a/>';--}}

                ajax: {
                    url: "{{ route('chalani.index') }}",
                    type: 'GET',
                    data: function(d) {
                        d.chalaniNumber = $('#chalaniNumber').val();
                        d.startNpDate = $('#start-np-date').val();
                        d.endNpDate = $('#end-np-date').val();
                    }



                },

                "pageLength": 6,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],

                "order": [
                    [0, "desc"]
                ],



                columns: [{
                        data: 'dp_chalani_number',
                        name: 'dp_chalani_number'
                    },
                    {
                        data: 'dp_chalani_date',
                        name: 'dp_chalani_date'
                    },
                    {
                        data: 'dp_chalani_subject',
                        name: 'dp_chalani_subject'
                    },
                    {
                        data: 'dp_chalani_letter_type_name',
                        name: 'dp_chalani_letter_type_name'
                    },
                    {
                        data: 'dp_chalani_letter_department',
                        name: 'dp_chalani_letter_department'
                    },
                    {
                        data: 'dp_chalani_letter_to',
                        name: 'dp_chalani_letter_to'
                    },
                    {
                        data: 'dp_chalani_file',
                        render: function(data, type, row, meta) {
                            return '<a href="{{ url('/') }}/' + data +
                                '" target="_blank"">View <a/>';

                        }
                    },
                    {
                        data: 'dp_chalani_kaifiyat',
                        name: 'dp_chalani_kaifiyat'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ],


            });

            $('#chalaniNumber').keyup(function(e) {
                table.draw()
            });
            $('#start-np-date').keyup(function(e) {
                table.draw()
            });
            var startDate = document.getElementById("start-np-date");
            startDate.nepaliDatePicker({
                onChange: function(e) {
                    table.draw()
                }
            });
            $('#end-np-date').keyup(function(e) {
                table.draw()
            });
            var endDate = document.getElementById("end-np-date");
            endDate.nepaliDatePicker({
                onChange: function(e) {
                    table.draw()
                }
            });

        });


        $(document).on('click', '#deleteChalani', function() {
            var id = $(this).data('id');
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
                        url: "{{ route('chalani.destroy', '') }}" + "/" + id,
                        data: data,
                        success: function(response) {
                            $('.chalani-data-table').DataTable().ajax.reload();
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

                    Swal.fire('रद्द गरियो  !', '', 'info')

                }
            })
        })
    </script>
@endsection

@extends('layouts.main')

@section('title')
    दर्ता
@endsection

{{-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" /> --}}
@section('content')
@section('back_url')
    {{ route('sewa.index') }}
@endsection
@section('back_page_title')
    सेवा
@endsection
<section id="darta-content" class="">
    <div class="card">
        <div class="card-header">


                <a href="{{ route('sewa.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                <span class="card-title">दर्ता </span>
                <a href="{{ route('darta.create') }}" style="float:right;" class="btn_palika" id="add-new"><i class="fas fa-plus-square"></i> नयाँ दर्ता</a>


        </div>

        <div class="card-body">
            <form>
                <div class="d-flex justify-content-between">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">दर्ता No.</label>
                        <input type="text" class="form-control" id="dartaNumber" aria-describedby="emailHelp"
                            placeholder="दर्ता No.">
                        {{-- <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <o  ption value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select> --}}
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">सुरु मिति</label>
                        <input type="text" class="form-control " id="start-np-date" placeholder="सुरु मिति">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">अन्तिम मिति</label>
                        <input type="text" class="form-control" id="end-np-date" placeholder="अन्तिम मिति">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">चलानी No.</label>
                        <input type="text" class="form-control" id="chalaniNumber" aria-describedby="emailHelp"
                            placeholder="चलानी No.">
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
                <table class="table table-hover darta-data-table">
                    <thead>
                        <tr>

                            <th>S.N.</th>
                            <th>दर्ता नम्बर</th>
                            <th>चलानी नम्बर</th>

                            <th>दर्ता मिती</th>
                            <th>बिषय</th>
                            <th>पत्र बुज्ने शाखा</th>
                            <th>साखाका सदस्य</th>
                            <th>स्क्यान फाइल</th>
                            <th>कैफियत</th>
                            <th>Actions</th>
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
<script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.7.min.js"
type="text/javascript"></script>
{{-- <script src="{{ asset('js/nepalidate.js') }}"></script> --}}
<script>
    // var mainInput = document.getElementById("start-np-date");
    // mainInput.nepaliDatePicker({
    //     onChange: function(e) {
    //         console.log(e.bs);
    //     }
    // });





    $(function() {
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





        var table = $('.darta-data-table').DataTable({
            "drawCallback": function () {



                @if (session('dartaNumber'))

                $('table tr').each(function(key,value) {

                    if(!key==0)
                    {

                        var dartaNumber = $(this).find("td").eq(0).html();
                        var session_dartaNumber="{{session('dartaNumber')}}";
                        // alert(dartaNumber+','+session_dartaNumber);
                        if(dartaNumber==session_dartaNumber)
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
            destroy: true,
            ajax: {
                url: "{{ route('darta.index') }}",
                type: 'GET',
                data: function(d) {
                    d.dartaNumber = $('#dartaNumber').val();
                    d.chalaniNumber = $('#chalaniNumber').val();
                    d.startNpDate = $('#start-np-date').val();
                    d.endNpDate = $('#end-np-date').val();
                }
            },

            "order": [
                [0, "desc"]
            ],
            columns: [
                {
                    data: 'id',
                    name: 'id'

                },
                {
                    data: 'dp_darta_number',
                    name: 'dp_darta_number'
                },
                {

                    data: 'dp_chalani_number',
                    name: 'dp_chalani_number'
                },

                {

                    data: 'dp_darta_date',
                    name: 'dp_darta_date'
                },
                {
                    data: 'dp_darta_subject',
                    name: 'dp_darta_subject'
                },
                {
                    data: 'dp_darta_letter_department_name',
                    name: 'dp_darta_letter_department_name'
                },
                {
                    data: 'dp_darta_letter_to_name',
                    name: 'dp_darta_letter_to_name'
                },

                {
                    data: 'dp_darta_file',
                    render: function(data, type, row, meta) {
                        return '<a href="{{ url('/') }}/' + data +
                            '" target="_blank"">View <a/>';
                    }
                },
                {
                    data: 'dp_darta_kaifiyat',
                    name: 'dp_darta_kaifiyat'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                },
            ],

        });
        $('#dartaNumber').keyup(function(e) {
            table.draw()
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



    $('#add-new').click(function() {
        $('#darta-content').hide();
        $('#darta-add-form').show();
    });

    $('#btn-back').click(function() {
        $('#darta-content').show();
        $('#darta-add-form').hide();
    });



    $(document).on('click', '#deleteDarta', function() {
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
                    url: "{{ route('darta.destroy', '') }}" + "/" + id,
                    data: data,
                    success: function(response) {
                        $('.darta-data-table').DataTable().ajax.reload();
                        if (response.status == 200) {


                            Swal.fire(response.message, '', 'success');

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

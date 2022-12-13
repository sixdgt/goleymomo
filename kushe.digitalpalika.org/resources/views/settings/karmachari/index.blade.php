@extends('layouts.main')

@section('title')
    डिजिटल पालिका | कर्मचारी
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">

            <a href="{{ route('settings.index') }}"><i class="fas fa-arrow-left arrow"></i></a>
            <span class="card-title">कर्मचारी</span>
            <a href="{{ route('karmachari.create') }}" class="btn_palika">+ थप सिर्जना गर्नुहोस्</a>
                {{-- <a href="{{route('karmachari.create')}}" class="btn_palika" data-bs-toggle="modal" id="createKarmachari" data-bs-target="#karmachariModel">+ थप सिर्जना गर्नुहोस्</a> --}}





        </div>
        <div class="card-body">

            <div class="nayaSamiti">
                <table class="table karmachari-data-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>क्र.म.</th>
                            <th>वाड</th>
                            <th>प्रकार</th>
                            <th>पुरा नाम</th>
                            <th>पद</th>
                            <th>सम्पर्क</th>
                            <th>फोटो</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>


                    </tbody>
                </table>


                {{-- <div class="modal fade" id="karmachariModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> --}}
                {{-- <div class="modal-dialog modal-xl" role="document"> --}}
                {{-- <div class="modal-content "> --}}
                {{-- <div class="modal-header"> --}}
                {{-- <h5 class="modal-title" id="exampleModalLongTitle" >नयाँ कर्मचारी विवरण थप्नुहोस्</h5> --}}
                {{-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> --}}
                {{-- <span aria-hidden="false">&times;</span> --}}
                {{-- </button> --}}
                {{-- </div> --}}
                {{-- <div class="modal-body"> --}}
                {{-- <div class="karmachari-modal-body"> --}}

                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('custom-script')
    <script>




        getData()

        function deleteKarmachari(id) {
            Swal.fire({
                title: 'Warning',

                text: 'के तपाइँ यसलाई मेटाउन निश्चित हुनुहुन्छ? एकपटक मेटाइएपछि पुन: प्राप्त गर्न सकिँदैन।',

                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                denyButtonText: `Don't Delete`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var data = {
                        id: $('#deleteKarmachari').attr('data-id'),
                        _token: "{{ csrf_token() }}",
                    }
                    console.log(id);
                    $.ajax({
                        type: "delete",
                        url: "{{ route('karmachari.destroy', '') }}" + "/" + id,
                        data: data,
                        success: function(response) {
                            getData()
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

        function getData() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var table = $('.karmachari-data-table').DataTable({
                    clear: true,
                    destroy: true,
                    processing: true,
                    serverSide: true,

                    ajax: {
                        url: "{{ route('karmachari.index') }}",
                        type: 'GET',
                        data: function(d) {
                            @if (session()->has('success'))
                               {{--d.id="{{session()->get('success')['id']}}";--}}
                            @endif
                        }
                    },

                    "pageLength": 6,
                    "aLengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ],
                    columns: [{
                            data: 'dp_karmachari_checkbox',
                            render: function(data, type, row, meta) {
                                return '<input type="checkbox">';
                                // return '<a href="' + data + '" target="_blank">View <a/>';
                            }
                        },
                        {
                            data: 'dp_karmachari_number',
                            name: 'dp_karmachari_number'
                        },
                        {
                            data: 'dp_karmachari_wada',
                            name: 'dp_karmachari_wada'
                        },
                        {
                            data: 'dp_karmachari_type',
                            name: 'dp_karmachari_type'
                        },
                        {
                            data: 'dp_karmachari_full_name',
                            name: 'dp_karmachari_full_name'
                        },
                        {
                            data: 'dp_karmachari_padh',
                            name: 'dp_karmachari_padh'
                        },
                        {
                            data: 'dp_karmachari_contact',
                            name: 'dp_karmachari_contact'
                        },
                        {
                            data: 'dp_karmachari_photo',
                            render: function(data, type, row, meta) {
                                return '<a href="' + data + '" target="_blank">View <a/>';
                            }
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        }
                    ],
                });

                @if (session() -> has('success'))
                table.draw();
                Swal.fire(

                    '{{session() ->get('success')['message']}}',
                    '',
                    'success'
                )
                @endif

        }


        {{-- $(document).on('click','#createKarmachari',function(){ --}}
        {{-- $('.karmachari-modal-body').load("{{route('karmachari.create')}}",function () { --}}

        {{-- }) --}}
        {{-- }) --}}

        $(document).on('click', '#editKarmachari', function() {
            var id = $(this).data('id');
            $('.karmachari-modal-body').load("{{ route('karmachari.index') }}" + "/" + id + "/edit", function() {

            })
        })
    </script>
@endsection

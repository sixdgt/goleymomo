
@extends('layouts.main')

@section('title')
    नागरिकता प्रतिलिपि सिफारिस
@endsection
@section('custom-css')
@endsection


@section('content')
    <style>

    </style>

    <section id="nagarikta-pratilipi-content" class="mt-2">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('sifaris.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                <span class="card-title">नागरिकता प्रतिलिपि सिफारिस</span>


                <a href="{{ route('nagarikta-pratilipi.create') }}" style="float:right;" class="btn_palika" id="add-new"><i class="fas fa-plus-square"></i> नयाँ</a>


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

                <div class="container-fluid" style="overflow-x: scroll;">
                    <table class="table table-hover data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>निवेदकको नाम</th>
                            <th>निवेदकको ठेगाना</th>
                            <th>निवेदकको नागरिकता नं.</th>
                            <th>निवेदकको फोन न.</th>
                            <th>सिफारिस मिती</th>

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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('nagarikta-pratilipi.index') }}",
                    type: 'GET',
                    data: function(d) {
                        d.sifaris_no = $('#sifaris_no').val();
                        d.citizenship_no = $('#citizenship_no').val();
                        d.nibedak_name = $('#nibedak_name').val();

                    }
                },

                "pageLength": 6,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'applicant_name_bibaran',
                        name: 'applicant_name_bibaran'
                    },
                    {
                        data: 'applicant_address_bibaran',
                        name: 'applicant_address_bibaran'
                    },
                    {
                        data: 'applicant_citizenship_number',
                        name: 'applicant_citizenship_number'
                    },
                    {
                        data: 'applicant_phone_number',
                        name: 'applicant_phone_number'
                    },
                    {
                        data: 'applied_date',
                        name: 'applied_date'
                    },


                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ],
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
            // var startDate = document.getElementById("start-np-date");
            // startDate.nepaliDatePicker({
            //     onChange: function(e) {
            //         table.draw()
            //     }
            // });
            // $('#end-np-date').keyup(function(e) {
            //     table.draw()
            // });
            // var endDate = document.getElementById("end-np-date");
            // endDate.nepaliDatePicker({
            //     onChange: function(e) {
            //         table.draw()
            //     }
            // });
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
                            url: "{{ route('nagarikta-pratilipi.destroy', '') }}" + "/" + id,
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



    </script>
@endsection



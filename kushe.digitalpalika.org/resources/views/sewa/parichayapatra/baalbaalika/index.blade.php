@extends('layouts.main')

@section('title')
डिजिटल पालिका | बालबालिका परिचय पत्र
@endsection

@section('custom-css')
<style>
  .asterik {
    color: red;
  }

  i {
    color: white !important;
  }

  .asterik {
    color: red;
  }

  form {
    box-shadow: 0 0 0 rgba(240,240,240,0);
  }

  .card {
    box-shadow: 0 10px 25px rgba(92,99,105,.2);
  }

  .btns {
    font-size: 1.2rem !important;
    border-radius: 0px !important;
  }

  table > tbody > td {
    font-size: 20px !important;
  }


  .main_th
  {
    white-space: nowrap;
  }
  .sub_th{
    white-space: nowrap;
  }
</style>
@endsection

@section('content')
<section class="mr-4 mt-2">
  <div class="card">
    <div class="card-header">


        <a href="{{ route('parichaya-patra.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
        <span class="card-title">बालबालिका परिचय पत्र</span>
        <a href="{{ route('baalbaalika.create') }}" class="btn_palika" style="float: right"> <i class="fas fa-plus-square"></i> नयाँ थप गर्नुहोस</a>


    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover baalbaalika-data-table">
        <thead>
          <tr>
            <th class="main_th">पहिलो नाम</th>
            <th class="main_th">बिचको नाम</th>
            <th class="main_th">थर</th>
            <th class="main_th" colspan="3">बुवाको</th>

            <th class="main_th" colspan="3">आमाको</th>

            <th class="main_th" colspan="3">बाजेको</th>
            <th class="main_th">लिङ्ग</th>
            <th class="main_th">जन्म मिति</th>
            <th class="main_th">फोटो</th>
            <th class="main_th">जन्म दर्ता</th>
            <th class="main_th">Action</th>
          </tr>

          <tr>
            <th class="sub_th" colspan="3"></th>
            <th class="sub_th">पहिलो नाम</th>
            <th class="sub_th">बिचको नाम</th>
            <th class="sub_th">थर</th>

            <th class="sub_th">पहिलो नाम</th>
            <th class="sub_th">बिचको नाम</th>
            <th class="sub_th">थर</th>

            <th class="sub_th">पहिलो नाम</th>
            <th class="sub_th">बिचको नाम</th>
            <th class="sub_th">थर</th>


            <th class="sub_th" colspan="5"></th>

          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection

@section('custom-script')
<script>
  $(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var table = $('.baalbaalika-data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('baalbaalika.index') }}",
      columns: [
        {data: 'first_name', name: 'first_name'},
        {data: 'middle_name', name: 'middle_name'},
        {data: 'last_name', name: 'last_name'},


        {data: 'father_first_name', name: 'father_first_name'},
        {data: 'father_middle_name', name: 'father_middle_name'},
        {data: 'father_last_name', name: 'father_last_name'},

        {data: 'mother_first_name', name: 'mother_first_name'},
        {data: 'mother_middle_name', name: 'mother_middle_name'},
        {data: 'mother_last_name', name: 'mother_last_name'},

        {data: 'grand_father_first_name', name: 'grand_father_first_name'},
        {data: 'grand_father_middle_name', name: 'grand_father_middle_name'},
        {data: 'grand_father_last_name', name: 'grand_father_last_name'},

        {data: 'gender', name: 'gender'},
        {data: 'dob', name: 'dob'},
        {data: 'baalbaalika_profile_picture', render: function (data, type, row, meta) {
                return '<a href="{{url('/')}}/' + data + '" target="_blank"">View <a/>';
            }
        }, 
        {data: 'baalbaalika_birth_certificate', render: function (data, type, row, meta) {
            return '<a href="{{url('/')}}/' + data + '" target="_blank"">View <a/>';
          }
        }, 
        {data: 'actions', name: 'actions', orderable: false, searchable: true},
      ],
    });
  });

  $('#deleteBaalbaalikaParichayapatra').click(function () {

  })

  $(document).on('click','#deleteBaalbaalikaParichayaPatra',function () {
    var id=$(this).data('id');
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
          id: $('#deleteBaalbaalikaParichayaPatra').attr('data-id'),
          _token: "{{ csrf_token() }}",
        }
        $.ajax({
          type: "delete",
          url: "{{ route('baalbaalika.destroy', '') }}" + "/" + id,
          data: data,
          success: function(response) {
            $('.baalbaalika-data-table').DataTable().ajax.reload();
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

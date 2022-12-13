@extends('layouts.main')

@section('title')
डिजिटल पालिका | निकासि सिफारिस
@endsection

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<div class="main">
    <div class="d-flex justify-content-between">
        <div class="nagarik-heading">
            <p><a href="{{route('sifaris.index')}}"><i class="fas fa-arrow-left arrow"></i></a>निकासि सिफारिस</p>
        </div>
        <div class="pt-2">
            <a href="#"><button class="btn btn-success"  data-toggle="modal" data-target="#sifarisModal">+थप सिर्जना गर्नुहोस्</button></a>
        </div>
    </div>
<div class="nayaSamiti">
 <table class="table">
        <thead>
          <tr>
            <th scope="col"><input type="checkbox"></th>
            <th scope="col">क्र.म.</th>
            <th scope="col" style="width: 15%;">व्यक्तिको नाम</th>
            <th scope="col" style="width: 15%;">विवरण</th>
            <th scope="col">ठेगाना</th>
            <th scope="col">सिफारिसको प्रकार</th>
            <th scope="col">सम्पर्क नम्बर</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            <tr class="fs-2">
                <td><input type="checkbox"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div class="d-flex">
                        <a href=""><button type="button" class="btn btn-primary btn-sm ms-2">Edit</button></a>
                        <a href=""><button type="button" class="btn btn-info btn-sm ms-2">Pdf</button></a>
                        <a href=""><button type="button" class="btn btn-danger btn-sm ms-2">Delete</button></a>
                    </div>
                </td>
            </tr>
        </tbody>
 </table>
</div>
</div>

<div class="modal fade" id="sifarisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Categories</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">

                @csrf
                  <div class="mb-3">
                    <label for="text" class="form-label"><b>व्यक्तिको नाम/Person Name</b></label>
                    <input type="text" class="form-control" id="" name="nikasi_name" placeholder="व्यक्तिको नाम">
                    <span class="text-danger">@error('nikasi_name'){{$message}}@enderror</span>
                  </div>

                  <div class="mb-3">
                    <label for="text" class="form-label"><b>ठेगाना/Addressh</b></label>
                    <input type="text" class="form-control" id="" name="nikasi_addressh" placeholder="ठेगाना">
                    <span class="text-danger">@error('nikasi_addressh'){{$message}}@enderror</span>
                  </div>

                  <div class="mb-3">
                    <label for="text" class="form-label"><b>सिफारिसको प्रकार/Sifaris Type</b></label>
                    <input type="text" class="form-control" id="" name="nikasi_sifaris_type" placeholder="सिफारिसको प्रकार">
                    <span class="text-danger">@error('nikasi_sifaris_type'){{$message}}@enderror</span>
                  </div>

                  <div class="mb-3">
                    <label for="text" class="form-label"><b>सम्पर्क नम्बर/Contatc Number</b></label>
                    <input type="text" class="form-control" id="" name="nikasi_contact" placeholder="सम्पर्क नम्बर">
                    <span class="text-danger">@error('nikasi_contact'){{$message}}@enderror</span>
                  </div>

                  <div class="mb-3">
                    <label for="text" class="form-label"><b>विवरण/Description</b></label>
                      <textarea class="ckeditor form-control" name="nikasi_dec"></textarea>                   
                    <span class="text-danger">@error('nikasi_dec'){{$message}}@enderror</span>
                  </div>                  

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>


<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">

        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });

</script>
@endsection

@extends('layouts.main')

@section('title')
डिजिटल पालिका | जन्म दर्ता
@endsection

@section('content')
<div class="main">
    <div class="d-flex justify-content-between p-2">
        <div class="nagarik-heading">
            <p><a href="{{route('ghatana-darta.index')}}"><i class="fas fa-arrow-left arrow"></i></a>जन्म दर्ता</p>
        </div>
    </div>
<div class="nayaSamiti">
    <table class="table">
        <thead>
          <tr>
            <th scope="col"><input type="checkbox"></th>
            <th scope="col">क्र.म.</th>
            <th scope="col" style="width: 15%;">व्यक्तिको नाम</th>
            <th scope="col">ठेगाना</th>
            <th scope="col">सिफारिसको प्रकार</th>
            <th scope="col">सम्पर्क नम्बर</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox"></td>
                <td>1</td>
                <td>Phuldev Mandal</td>
                <td>Biratnagar</td>
                <td>Nagarita Sifaris</td>
                <td>9817348212</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                    <a href="" class="btn btn-info btn-sm">Pdf</a>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </td>
             </tr>
        </tbody>
      </table>

</div>
</div>
@endsection

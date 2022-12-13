<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- custom css  -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DIGITAL PALIKA | Login</title>
  </head>
  <body>
    <!-- login header  -->
        <div class="" style="display: grid;place-items: center;/*! place-content: center; *//*! display: flex; *//*! align-items: center; *//*! justify-content: center; */position: absolute;transform: translate(-50%,-50%);top: 50%;left: 50%;">
            <div class="card main-card">
                <div class="card-header login-card-header"><h3>WELCOME TO</h3><h6>Digital Palika</h6></div>
                <div class="card-body">
                    <!-- form  -->
                    <section>
                        <div class="1-form">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form_div">
                                    <input type="email"class="form_input" name="email" placeholder="" required>
                                    <label for="" class="form_label">Email</label>
                                </div>
                                <div class="form_div">
                                    <input type="password" name="password" class="form_input" required placeholder="">
                                    <label for="" class="form_label">Password</label>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Remember me
                                        </label>
                                    </div>
                                    <div class="pass"><p><a href="#">Forgot password?</a></p></div>
                                </div>
                                <input type="submit" class="form_button" value="LOGIN">
                            </form>
                        </div>
                    </section>
                    <!-- form  -->
                </div>
            </div>
        </div>
    <!-- login header  -->
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>

<div>
    <section id="chalani-content" class="mt-2">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="me-auto">{{ $headers['title'] }}</h5>
                    @if (isset($headers['route']))
                        <a href="{{ $headers['route'] }}" class="btn_palika" id="add-new">
                            <i class="fas fa-plus-square"></i> नयाँ प्रविष्टि</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                {{-- <form>
                    <div class="d-flex justify-content-between">
                        {{-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">दर्ता No.</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                        {{-- <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">कोड</label>
                            <input type="text" class="form-control" id="code" placeholder="कोड">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">नाम</label>
                            <input type="text" class="form-control" placeholder="नाम" id="name">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">स्थिति:</label>
                            <input type="text" class="form-control" id="situation" aria-describedby="emailHelp"
                                placeholder="स्थिति."> --}}
                        {{-- <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    </div>
            </div>
            </form> --}}
            <div class="container-fluid" style="overflow-x: scroll;">
                {{ $slot }}
            </div>
        </div>
</div>
</section>
</div>

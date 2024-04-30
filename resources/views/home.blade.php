<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css ">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary text-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/student">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Add </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/student">View</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
       
        {{-- @if (isset($status))
            <h2>{{$status}}</h2>   
        @endif --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <h2 class="text-center">STUDENT REGISTER FORM</h2>
        <form action="/register" method="post" class="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" id=""
                        class="form-control  @error('name') is-invalid @enderror" value="{{old('name')}}">
                    <label for="" class="form-label">Email  </label>
                    <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                    <label for="" class="form-label">Phone</label>
                    <input type="text" name="phone" id="" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
                    <label for="" class="form-label">Photo</label>
                    <input type="file" name="photo" id="" class="form-control @error('photo') is-invalid @enderror" value="{{old('photo')}}">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Address</label>
                    <input type="text" name="address" id="" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}">
                    <label for="" class="form-label">Department</label>
                    <input type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{old('department')}}">
                    <label for="" class="form-label">Registeration no</label>
                    <input type="text" name="regnno" id="" class="form-control @error('regnno') is-invalid @enderror" value="{{old('regnno')}}">
                </div>
            </div>
            <input type="submit" class="btn btn-success form-control my-2" value="Submit">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js  "></script>
</body>

</html>

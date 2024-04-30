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
        <h2 class="text-center">STUDENT EDIT FORM</h2>
        <form action="/student/{{ $student->id }}/update" method="post" class="form" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" id="" value="{{ $student->name }}"
                        class="form-control">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" id="" value="{{ $student->email }}"
                        class="form-control">
                    <label for="" class="form-label">Phone</label>
                    <input type="text" name="phone" id="" value="{{ $student->phone }}"
                        class="form-control">
                    <input type="file" name="photo" id="photo1"  class="form-control mt-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img src="/students/{{ $student->photo }}"  height="50"
                                width="50" class="img-fluid" alt="" srcset="">
                            <a href="/students/{{ $student->photo }}" target="_blank"
                                rel="noopener noreferrer">download</a>
                        </div>
                        <img src="" height="50" id="selImg" width="50" class="img-fluid"
                            alt="" srcset="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Address</label>
                    <input type="text" name="address" value="{{ $student->address }}" id=""
                        class="form-control">
                    <label for="" class="form-label">Department</label>
                    <input type="text" class="form-control" name="department" value="{{ $student->department }}">
                    <label for="" class="form-label">Registeration no</label>
                    <input type="text" name="regnno" value="{{ $student->regnno }}" id=""
                        class="form-control">
                </div>
            </div>
            <input type="submit" class="btn btn-success form-control my-2" value="Submit">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        
        function getImg(event) {
            console.log(event);
            let img=document.getElementById('photo1').value;
            let photo=document.getElementById('selImg');
            // photo=img;
            photo.setAttribute('src',img);
            // console.log(photo);
        }
    </script>
</body>

</html>

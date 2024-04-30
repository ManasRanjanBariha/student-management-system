<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css ">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
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
    {{-- {{ $status }} --}}
    @if (session('status'))
        <div class="container my-1" id="parentElement">
            <div id="childElement" class="alert alert-success d-flex justify-content-between" role="alert">
               {{session('message')}}
                <button type="button" id="btn1" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container my-2">
        <div class="d-flex "><a href="/generatepdf" class="btn btn-primary me-5">Pdf</a>
            <a href="/export-student" class="btn btn-primary">Excel</a>
        </div>
        <table class="table" id="student_table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Registeration no</th>
                    <th scope="col">Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($students as $student)
                    <tr>
                        <th>{{ $loop->index + 1 }}</th>
                        <th>{{ $student->name }}</th>
                        <th><img src='students/{{ $student->photo }}' height="50" width="50" class=""
                                alt="" style="border-radius: 50%; object-fit: cover;"></th>
                        <td>{{ $student->email }}</td>
                        <td> {{ $student->phone }} </td>
                        <td> {{ $student->address }}</td>
                        <td>{{ $student->regnno }}</td>
                        <td>{{ $student->department }}</td>
                        <th>
                            <div class="d-flex flex-row gap-4"><a href="/student/{{ $student->id }}/edit"
                                    class="btn btn-success">Edit</a>
                                <form id="student_{{ $student->id }}" action="/student/{{ $student->id }}/delete"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        onclick="del('student_{{ $student->id }}')">Delete</button>
                                </form>
                            </div>
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#student_table').DataTable(
                // paging: false
            );
        });

        function del(formid) {
            if (confirm('Are you really want to delete')) {
                document.getElementById(formid).submit();
            }

        }
        setTimeout(() => {
            $('#btn1').click();
        }, 3000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js  "></script>
</body>

</html>

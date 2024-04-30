<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2 style="text-align: center">Students Data</h2>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th scope="col">slno</th>
            <th scope="col">Name</th>
            <th scope="col">Photo</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Registeration no</th>
            <th scope="col">Department</th>
        </tr>
        <tbody>

            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td><img src='students/{{$student->photo}}' height="50" width="50"
                            class="img-fluid" alt="" style="border-radius: 50%; object-fit: cover;"></td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->regnno }}</td>
                    <td>{{ $student->department }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

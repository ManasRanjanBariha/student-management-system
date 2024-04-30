<table>
    <thead>
        <tr>
            @foreach($headings as $heading)
                <th>{{ $heading }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->registration_no }}</td>
                <td>{{ $student->department }}</td>
                <td>{{ $student->photo }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

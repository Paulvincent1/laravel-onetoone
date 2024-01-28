<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .header a {
            text-decoration: none;
            background-color: #28a745;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td button, input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        td button:hover, input[type="submit"]:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="{{ route('student.create') }}">ADD A STUDENT</a>
    </div>
    
    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>AGE</th>
                <th>ADDRESS</th>
                <th>COURSE</th>
                <th>YEAR</th>
                <th>CONTINENT</th>
                <th>COUNTRY NAME</th>
                <th>CAPITAL</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>

            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ optional($student->academic)->course }}</td>
                <td>{{ optional($student->academic)->year }}</td>
                <td>{{ optional($student->country)->continent }}</td>
                <td>{{ optional($student->country)->name }}</td>
                <td>{{ optional($student->country)->capital }}</td>
                <td>
                    <button onclick="location.href='{{ route('student.edit', ['id' => $student]) }}'">EDIT</button>
                </td>
                <td>
                    <form action="{{ route('student.delete', ['id' => $student]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>

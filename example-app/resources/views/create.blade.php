<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            color: #ff0000;
        }
        
        ul li {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <form action="{{route('student.store')}}" method="post">
        @csrf
        @method('post')
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                
            @endforeach
        @endif
        </ul>
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>Age</label>
            <input type="text" name="age">
        </div>

        <div>
            <label>Address</label>
            <input type="text" name="address">
        </div>

        <div>
            <label>Course</label>
            <input type="text" name="academic[course]">
        </div>

        <div>
            <label>Year</label>
            <input type="text" name="academic[year]">
        </div>

        <div>
            <label>Continent</label>
            <input type="text" name="country[continent]">
        </div>

        <div>
            <label>Name</label>
            <input type="text" name="country[name]">
        </div>

        <div>
            <label>Capital</label>
            <input type="text" name="country[capital]">
        </div>

        <div>
            <input type="submit">
        </div>

    </form>
</body>
</html>
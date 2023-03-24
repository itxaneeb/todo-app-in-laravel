<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @dd($users); --}}
        @php
            echo "<pre>";
            print_r($users->all());
            exit();  
        @endphp
        
    @foreach ($users as $user)
        <tr>
            <td>{{$user->StudentName}}</td>
            <td>{{$user->guardianName}}</td>
            <td>{{$user->mobileNumber}}</td>
            <td>{{$user->schoolName}}</td>
            <td>{{$user->classRollnumber}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->birthDate}}</td>
        </tr>
    @endforeach
</body>
</html>
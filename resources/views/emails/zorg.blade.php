<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>metadent</title>
</head>
<body>
    <div>
        <h5>Subject:{{$details['subject']}}</h5>
        <p>{{$details['message']}}

    {{-- @foreach ($details as $item)
    
    <p>{{ $item }}</p> --}}
    {{-- @endforeach --}}
    </div>
</body>
</html>
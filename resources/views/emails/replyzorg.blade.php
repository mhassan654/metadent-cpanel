<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{get_facility_setting('app_name')}}</title>
</head>
<body>
    <div>
        {{-- <h5>metadent zorgmail message form system</h5> --}}
    @foreach ($data as $item)

    <p>{{ $item }}</p>
    @endforeach
    </div>
</body>
</html>

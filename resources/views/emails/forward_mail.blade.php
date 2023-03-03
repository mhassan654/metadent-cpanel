<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>metadent</title>
</head>
<body>
    <div style="width: 100%">
        <div style="background-color: hsl(27, 96%, 61%); padding: 7px">
        <center><h3 style="color: white ">MetaDent</h3></center>
        </div>
        <h6>FROM:{{$data['more_details']}} </h6>
        <small>DATE:{{$data['date']}}</small>
        <h6>{{$data['subject']}} </h6>
       <p  style="padding-top: 5px">{{$data['message']}}</p>
    </div>
</body>
</html>

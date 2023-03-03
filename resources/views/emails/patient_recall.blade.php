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
        <p>{{$details['email']}}</p>
        <p>Patient Recall from Dr <b>{{$details['person']}}</b> make your appointment on <b>{{$details['date']}}</b> and onwords using this link 
            <a href="{{$details['link']}}">{{$details['link']}}</a><br><br>
        or click to <a href="{{$details['confirm']}}" style="background: orange; color: white; padding: 6px 6px; text-decoration: none;">CONFIRM</a> your appointment.
        </p>
    </div>
</body>
</html>

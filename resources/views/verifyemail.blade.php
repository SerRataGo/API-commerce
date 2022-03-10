<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Thank you {{$email}} for your registeration, please click here to verify your email</h3>
    <form method="get" action="{{route('verify.email')}}">
        <input type="hidden" name="email" value="{{$email}}">
        <input type="submit" value="Verify Email">
    </form>
</body>
</html>
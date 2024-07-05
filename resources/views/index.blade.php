<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page | EkramShethil</title>
    {{-- Bootstrap Cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <form>
                <div class="title"><span>Welcome page</span></div>
                <div class="signup-link">Sign In? <a href="{{url('login')}}">Login</a></div>
                <div class="signup-link">Join Now? <a href="{{ url('registration') }}">Registration</a></div>
            </form>
        </div>
    </div>

</body>

</html>

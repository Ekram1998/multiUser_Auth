<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    {{-- Bootstrap Cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <form action="{{ url('login_post') }}" method="post">
                @csrf
                <div class="title">
                    <h1>Login Page</h1>
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>
                {{-- Password --}}
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>

                <div class="pass"><a href="{{ url('forgot') }}">Forgot Pasword</a></div>
                <br>
                {{-- button --}}
                <div class="form-group">
                    <input type="submit" value="Login">
                </div>

                {{-- signpage --}}
                <div class="signup-link">Join Now? <a href="{{ url('registration') }}">Registration</a></div>
                {{-- Homepage --}}
                <div class="signup-link">Welcome Page? <a href="{{ url('/') }}">Home Page</a></div>
            </form>
        </div>
    </div>
</body>

</html>

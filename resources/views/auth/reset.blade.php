<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Page</title>
    {{-- Bootstrap Cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title">
                <h1>Reset Password Page</h1>
            </div>
            <form action="{{ url('reset_post/' . $token) }}" method="post">
                @csrf
                {{-- Password --}}
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                {{-- Confirm Password --}}
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
                </div>

                <br>
                {{-- button --}}
                <div class="form-group">
                    <input type="submit" value="Reset Password">
                </div>

            </form>
        </div>
    </div>
</body>

</html>

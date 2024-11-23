<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/login.css">
    <title>Login</title>
</head>
<body>
    <x-navbar/>
    <section class="login">
        <div class="login-form">
            <h1>Login</h1>
            @if(session('error'))
            <h3 style="color:red">{{session('error')}}</h3>
            @endif
            <form action="/login" method="POST">
                @csrf
                <label for="username">Username:</label><br>
                <input type="text" name="username"><br><br>
                <label for="password">Password:</label><br>
                <input type="password" name="password"><br><br>
                <input type="submit" value="Login"><br>
            </form>
            <a href="/signup">Don't have an account?</a>

        </div>
    </section>
</body>
</html>
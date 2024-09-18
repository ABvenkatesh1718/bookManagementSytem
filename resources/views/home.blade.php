<!doctype html>
<html lang = "en" >
<head >
    <meta charset = "UTF-8" >
    <meta name = "viewport"
          content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge" >
    <title >Book Management System</title >
</head >
<body >

    <h1></h1>
    <h1>User Registration</h1>
    <form action="{{ route('userRegistration') }}" method="POST">
        @csrf

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <br>

        <button type="submit">Register</button>
    </form>



    <h1>login page!</h1>

    <form  action="/user/login" method="post">

        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>

    </form >

    @if(session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
    @endif










    <h1></h1>

</body >
</html >

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{url('css/Auth/login.css')}}">

</head>
<body>
    <div class="container">
        <div class="logo">
            <!-- Your logo goes here -->
            <img src="images/webdesign/utemelearninglogo2.png" alt="Logo">
            <h3>Login to UTeM E-Learning System</h3>
        </div>

        <x-validation-errors class="mb-4" />

        <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div style="margin-bottom:10px;">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required autofocus >
                </div>
                <div style="margin-bottom:10px;">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required >
                </div>  

                <button type="submit">Log in</button>

                <div class="sign-up" style="margin-bottom:10px;">
                    <p>Don't have an account?<a href="{{route('register')}}">Sign up now</a></p>                   
                </div>

            </form>
        </div>
    </div>
</body>
</html>

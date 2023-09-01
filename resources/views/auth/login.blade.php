<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #3953a465;
        }
        
        .login-card {
            background-color: #fff;
            max-width: 800px;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .login-card h2 {
            text-align: center;
            color: #3953a4;
        }

        .login-card form {
            display: flex;
            flex-direction: column;
        }

        .login-card label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #3953a4;
        }

        .login-card input[type="text"],
        .login-card input[type="password"] {
            padding: 10px;
            width: 400px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .login-card input[type="submit"] {
            background-color: #3953a4;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-card input[type="submit"]:hover {
            background-color: #31467b;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Login</h2>
        <form action="{{route('login')}}" method="post">
            @csrf
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>

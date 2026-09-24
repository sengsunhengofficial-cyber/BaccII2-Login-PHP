<?php
session_start();
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!isset($_SESSION['email'])) {
        $message = 'Please register first.';
    } elseif ($email === $_SESSION['email'] && $password === $_SESSION['password']) {
        $_SESSION['logged_in'] = true;
        header('Location: Home.php');
        exit();
    } else {
        $message = 'Email or password is incorrect.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef1f6;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 360px;
            margin: auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px #d0d6e0;
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: #2f4b7c;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #2f4b7c;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #23375e;
        }

        .message {
            min-height: 20px;
            color: #b42318;
        }

        .link {
            display: block;
            text-align: center;
            color: #2f4b7c;
        }
    </style>
</head>
<body>
    <main class="container">
        <h2>Sign In</h2>
        <form method="post">
            <input type="text" name="email" placeholder="Email"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <button type="submit">Sign In</button>
        </form>
        <p class="message"><?php echo $message; ?></p>
        <a class="link" href="Register.php">Create an account</a>
    </main>
</body>
</html>
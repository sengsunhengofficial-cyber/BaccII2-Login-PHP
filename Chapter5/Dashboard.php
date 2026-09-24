<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: Login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Hub</title>
    <style>
       * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background-color: #f4f1ea;
            color: #2e2a24;
        }

        .hub {
            width: 600px;
            margin: 50px auto;
            background-color: white;
            border: 1px solid #e0dccf;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .hub-header {
            padding: 20px;
            background-color: #8a5a2f;
            color: white;
        }

        h1 {
            margin: 0;
            font-size: 26px;
        }

        .hub-content {
            padding: 25px;
        }

        .hub-content p {
            margin-bottom: 15px;
        }

        .hub-link {
            display: block;
            padding: 12px;
            background-color: #f6ede2;
            border: 1px solid #e2cba9;
            border-radius: 5px;
            color: #6d4519;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
        }

        .hub-link:hover {
            background-color: #eedfc9;
        }

        .signout-form {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e0dccf;
        }

        .signout-button {
            width: 100%;
            padding: 12px;
            background-color: #b1471f;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .signout-button:hover {
            background-color: #953a19;
        }

    </style>
</head>

<body>
    <main class="hub">
        <header class="hub-header">
            <h1>Welcome to your Project Hub</h1>
        </header>
        <section class="hub-content">
            <p><a class="hub-link" href="Workspace/Projects/Index.php">Open Project Workspace</a></p>
            <form class="signout-form" action="Logout.php" method="post">
                <button class="signout-button" type="submit">Sign Out</button>
            </form>
        </section>
    </main>
</body>

</html>
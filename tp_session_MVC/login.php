<?php
session_start();

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: #1B4F8A;
            margin-bottom: 8px;
        }

        p.subtitle {
            color: #666;
            margin-bottom: 24px;
            font-size: 14px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            font-size: 14px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
            margin-bottom: 16px;
        }

        input:focus {
            outline: none;
            border-color: #2E75B6;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #1B4F8A;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #2E75B6;
        }

        .error {
            background: #fdecea;
            color: #c0392b;
            border: 1px solid #f5c6cb;
            padding: 10px 14px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Connexion</h2>
        <form action="controllers/authController.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>
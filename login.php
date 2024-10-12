<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🏉チーム一覧登録ログイン🏉</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body setup */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Central login container */
        .login-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        /* Header styles */
        header {
            margin-bottom: 1.5rem;
        }

        header nav {
            font-size: 1.5rem;
            color: #555;
        }

        /* Input group styling */
        .input-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        /* Label and input fields styling */
        .input-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1rem;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        /* Button styling */
        .login-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Button hover effect */
        .login-btn:hover {
            background-color: #4cae4c;
        }

        /* Input field focus styling */
        .input-group input:focus {
            border-color: #5cb85c;
            outline: none;
            box-shadow: 0 0 5px rgba(92, 184, 92, 0.3);
        }
    </style>
</head>
<body>

<div class="login-container">
    <header>
        <nav>🏉TEAM RECORD LOGIN🏉</nav>
    </header>

    <form name="form1" action="login_act.php" method="post">
        <div class="input-group">
            <label for="lid">ID:</label>
            <input type="text" name="lid" id="lid" required>
        </div>
        <div class="input-group">
            <label for="lpw">PW:</label>
            <input type="password" name="lpw" id="lpw" required>
        </div>
        <input type="submit" value="ログイン" class="login-btn">
    </form>
</div>

</body>
</html>

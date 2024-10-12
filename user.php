<?php
session_start();
include "funcs.php";
sschk();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録</title>
  <style>
    /* 基本スタイルリセット */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f7f6;
      color: #333;
      padding: 20px;
    }

    header {
      background-color: #2c3e50;
      color: white;
      text-align: center;
      padding: 20px;
      font-size: 1.8rem;
      font-weight: bold;
    }

    .container {
      max-width: 600px;
      margin: 40px auto;
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    legend {
      font-size: 1.5rem;
      color: #34495e;
      margin-bottom: 20px;
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 15px;
      font-size: 1.1rem;
      color: #555;
    }

    input[type="text"], input[type="password"], input[type="submit"], input[type="radio"] {
      font-size: 1rem;
      padding: 10px;
      width: 100%;
      margin-top: 8px;
      border-radius: 5px;
      border: 1px solid #ddd;
      background-color: #f9f9f9;
      transition: border-color 0.3s;
    }

    input[type="text"]:focus, input[type="password"]:focus {
      border-color: #3498db;
      outline: none;
    }

    input[type="radio"] {
      width: auto;
      margin-right: 10px;
    }

    .radio-label {
      display: inline-block;
      margin-right: 20px;
    }

    input[type="submit"] {
      background-color: #3498db;
      color: white;
      border: none;
      cursor: pointer;
      font-size: 1.2rem;
      font-weight: bold;
      padding: 12px;
      width: 100%;
      margin-top: 20px;
    }

    input[type="submit"]:hover {
      background-color: #2980b9;
    }

    .navbar {
      margin-bottom: 20px;
      text-align: center;
    }

    .navbar a {
      color: #3498db;
      text-decoration: none;
      margin: 0 10px;
      font-size: 1rem;
    }

    .navbar a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

<header>
  <?php echo $_SESSION["name"]; ?> さん、ようこそ！
</header>

<!-- ユーザーメニュー -->
<div class="navbar">
  <?php include("menu.php"); ?>
</div>

<!-- Main -->
<div class="container">
  <form method="post" action="user_insert.php">
    <fieldset>
      <legend>ユーザー登録</legend>
      <label>名前：
        <input type="text" name="name" required>
      </label>
      <label>Login ID：
        <input type="text" name="lid" required>
      </label>
      <label>Login PW：
        <input type="password" name="lpw" required>
      </label>
      <label>管理FLG：</label>
      <div>
        <label class="radio-label">
          <input type="radio" name="kanri_flg" value="0" required> 一般
        </label>
        <label class="radio-label">
          <input type="radio" name="kanri_flg" value="1"> 管理者
        </label>
      </div>
      <input type="submit" value="送信">
    </fieldset>
  </form>
</div>

</body>
</html>


</body>
</html>
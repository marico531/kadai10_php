<?php
// エラーメッセージ表示
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// セッション開始
session_start();

// データベース接続
include("funcs.php");
$pdo = db_conn(); // funcs.phpにあるdb_conn()関数を呼び出す

// ログインチェック
sschk();

// データ登録SQL作成
$sql = "SELECT * FROM rugby_an_db";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ表示処理
if($status==false) {
  sql_error($stmt);
} else {
  $values = $stmt->fetchAll(PDO::FETCH_ASSOC); // 全データ取得
  $json = json_encode($values,JSON_UNESCAPED_UNICODE); // JSON形式でデータを取り込む
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>チーム一覧表示</title>
<style>
  /* 全体のリセット */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
  }

  /* ヘッダーのスタイル */
  header {
    background-color: #5cb85c;
    padding: 10px;
    color: white;
    text-align: center;
    margin-bottom: 20px;
    font-size: 1.5rem;
  }

  /* ナビゲーションリンク */
  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .navbar a {
    color: white;
    text-decoration: none;
    padding: 5px 10px;
    background-color: #4cae4c;
    border-radius: 4px;
  }

  .navbar a:hover {
    background-color: #45a049;
  }

  /* テーブルのスタイル */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
    color: #333;
  }

  td a {
    color: #5cb85c;
    text-decoration: none;
  }

  td a:hover {
    text-decoration: underline;
  }

  /* レスポンシブ対応 */
  @media (max-width: 768px) {
    th, td {
      display: block;
      text-align: right;
    }

    th::before {
      content: attr(data-label);
      float: left;
      font-weight: bold;
    }
  }
</style>
</head>
<body>

<header>
  <div class="navbar">
    <span><?=$_SESSION["name"]?> さん、こんにちわ！</span>
    <div>
      <a href="index.php">チーム登録</a>
      <a href="logout.php">ログアウト</a>
    </div>
  </div>
</header>

<!-- メインコンテンツ -->
<div>
  <h2>チーム一覧</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>チーム名</th>
        <th>チームサイト</th>
        <th>メインスタジアム名</th>
        <th>スタジアムサイト</th>
        <th>備考</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($values as $v){ ?>
        <tr>
          <td><?= h($v["id"]) ?></td>
          <td><?= h($v["team_name"]) ?></td>
          <td><a href="<?= h($v["team_url"]) ?>" target="_blank">公式サイト</a></td>
          <td><?= h($v["stadium_name"]) ?></td>
          <td><a href="<?= h($v["stadium_url"]) ?>" target="_blank">公式サイト</a></td>
          <td><?= h($v["naiyou"]) ?></td>
          <td>
            <a href="detail.php?id=<?=h($v["id"])?>">更新</a>
            <?php if($_SESSION["kanri_flg"]=="1"){ ?>
            <a href="delete.php?id=<?=h($v["id"])?>">削除</a>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<script>
  const jsonData = '<?php echo $json; ?>';
  console.log(JSON.parse(jsonData));
</script>

</body>
</html>


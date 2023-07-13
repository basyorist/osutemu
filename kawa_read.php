<?php
// DB接続したいファイル（kawa_create.php, kawa_read.php, など）

include('functions.php');
$pdo = connect_to_db();

// 他のDB接続が必要なファイルでも上記の2行でOK！


// $dbn = 'mysql:dbname=YOUR_DB_NAME;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }

$sql = 'SELECT * FROM question_table ORDER BY created_at ASC';

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["question"]}</td>
      <td>{$record["ans_1"]}</td>
      <td>{$record["ans_2"]}</td>
      <td>{$record["ans_3"]}</td>
      <td>{$record["ans_4"]}</td>
      <td>{$record["right_num"]}</td>
      <td>
        <a href='kawa_edit.php?id={$record["id"]}'>編集</a>
      </td>
     
      <td>
        <a href='kawa_delete.php?id={$record["id"]}'>削除</a>
      </td>
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>おすテム問題一覧</title>
</head>

<body>
  <fieldset>
    <legend>おすテム問題一覧</legend>
    <a href="kawa_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>問題</th>
          <th>選択肢１</th>
          <th>選択肢２</th>
          <th>選択肢３</th>
          <th>選択肢４</th>
          <th>正解番号</th>
        
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
  <!-- スタイルを見やすく変更 -->
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    table th {
      background-color: #E3F4F4;
      border: 1px solid #000;
      padding: 10px;
      text-align: center;
    }

    table td {
      border: 1px solid #000;
      padding: 10px;
      text-align: center;
    }

</body>

</html>
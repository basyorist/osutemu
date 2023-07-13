<?php
include('functions.php');
$pdo = connect_to_db();

// var_dump($GET);
// exit();

// id受け取り
$id = $_GET['id'];


// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM question_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問題編集画面</title>
</head>

<body>
  <form action="kawa_update.php" method="POST">
    <fieldset>
      <legend>問題編集画面</legend>
      <a href="kawa_read.php">一覧画面</a>
      <div>
        問題: <input type="text" name="question" value="<?= $result['question'] ?>">
      </div>
      <div>
        選択肢１: <input type="text" name="ans_1" value="<?= $result['ans_1'] ?>">
      </div>
      <div>
        選択肢２ : <input type="text" name="ans_2" value="<?= $result['ans_2'] ?>">
      <div>
      <div>
        選択肢３ : <input type="text" name="ans_3" value="<?= $result['ans_3'] ?>">
      <div>
      <div>
        選択肢４ : <input type="text" name="ans_4" value="<?= $result['ans_4'] ?>">
      <div>
      <div>
        正解番号 : <input type="text" name="right_num" value="<?= $result['right_num'] ?>">
      <div>
      <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </div>
      <div>
        <button>編集実行</button>
      </div>
    </fieldset>
  </form>

</body>

</html>
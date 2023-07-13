<?php
if (
  !isset($_POST['question']) || $_POST['question'] === '' ||
  !isset($_POST['ans_1']) || $_POST['ans_1'] === '' ||
  !isset($_POST['ans_2']) || $_POST['ans_2'] === '' ||
  !isset($_POST['ans_3']) || $_POST['ans_3'] === '' ||
  !isset($_POST['ans_4']) || $_POST['ans_4'] === '' ||
  !isset($_POST['right_num']) || $_POST['right_num'] === ''
) {
  exit('すべての項目を入力してください');
}

$question = $_POST['question'];
$ans_1 = $_POST['ans_1'];
$ans_2 = $_POST['ans_2'];
$ans_3 = $_POST['ans_3'];
$ans_4 = $_POST['ans_4'];
$right_num = $_POST['right_num'];

// DB接続
include('functions.php');
$pdo = connect_to_db();

$dbn = 'mysql:dbname=kawashin_db;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

$sql = 'INSERT INTO question_table(id, question, ans_1, ans_2, ans_3, ans_4, right_num, created_at, updated_at, deleted_at) VALUES(NULL, :question, :ans_1,:ans_2,:ans_3, :ans_4, :right_num, now(), now(),now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':question', $question, PDO::PARAM_STR);
$stmt->bindValue(':ans_1', $ans_1, PDO::PARAM_STR);
$stmt->bindValue(':ans_2', $ans_2, PDO::PARAM_STR);
$stmt->bindValue(':ans_3', $ans_3, PDO::PARAM_STR);
$stmt->bindValue(':ans_4', $ans_4, PDO::PARAM_STR);
$stmt->bindValue(':right_num', $right_num, PDO::PARAM_INT);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:kawa_input.php");
exit();

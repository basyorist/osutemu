<?php
// 入力項目のチェック
// var_dump($_POST);
// exit();
include('functions.php');



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
$id = $_POST['id'];

// DB接続
$pdo = connect_to_db();



$sql = 'UPDATE question_table SET question=:question, ans_1=:ans_1, ans_2=:ans_2, ans_3=:ans_3, ans_4=:ans_4, right_num=:right_num, updated_at=now() WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':question', $question, PDO::PARAM_STR);
$stmt->bindValue(':ans_1', $ans_1, PDO::PARAM_STR);
$stmt->bindValue(':ans_2', $ans_2, PDO::PARAM_STR);
$stmt->bindValue(':ans_3', $ans_3, PDO::PARAM_STR);
$stmt->bindValue(':ans_4', $ans_4, PDO::PARAM_STR);
$stmt->bindValue(':right_num', $right_num, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:kawa_read.php');
exit();



<?php
$id = $_GET['id'];

include('functions.php');
$pdo = connect_to_db();

$sql = 'DELETE FROM question_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:kawa_read.php");
exit();

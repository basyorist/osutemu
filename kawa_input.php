<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>おすテム問題作成フォーム</title>
</head>

<body>
  <form action="kawa_create.php" method="POST">
    <fieldset>
      <legend>おすテム問題作成フォーム</legend>
      <a href="kawa_read.php">問題一覧へ</a>

      <div class=queform>
      <div>
        <p>問題: </p>
        <textarea cols="80（横幅）" rows="5（高さ）" name="question"></textarea>
        <!-- 問題: <input type="text" name="question"> -->
      </div>
      <div>
        選択肢１: <input type="text" name="ans_1">
      </div>
      <div>
        選択肢２: <input type="text" name="ans_2">
      </div>
      <div>
        選択肢３: <input type="text" name="ans_3">
      </div>
      <div>
        選択肢４: <input type="text" name="ans_4">
      </div>
      <div class=right_num>
        正解番号: <input type="text" name="right_num">
      </div>
        <button>問題作成</button>
      </div>
    </fieldset>
  </form>

  
  <style>
    /* rightnumのフォームを小さく */
    .right_num {
      width: 100px;
    }

    
    body {
      max-width: 800px;
      margin: 0 auto;
    }
    
    input[type="text"] {
      width: 100%;
    }
    

    fieldset {
      border: 1px solid #666;
      padding: 0.5em;
      margin: 1em 0;
    }

    legend {
      border: none;
      font-size: 1.5em;
      font-weight: bold;
    }

    div {
      margin-bottom: 0.5em;
    }

    input[type="text"] {
      border: 1px solid #ccc;
      padding: 0.5em;
      font-size: 1em;
    }

    button {
      display: block;
      padding: 0.5em 1em;
      margin: 0 0 0 auto;
    }

</body>

</html>
<?php
// 以下はランダムな数字を格納した配列を表示するプログラムです。
// 配列内の隣合う数字を比較して左側から小さい順に表示されるよう配列の中身を並び替えてください。
// 並び替えはfor文を使用すること
// (sort関数などを使用すれば実装は可能ですが、for文を使って一つ一つの値を比較・操作して並べ替えを実装してみてください。)

$arr = [99, 3, 12, 45, 60, 100, 31, 7, 28];

// 例）
// 4, 3, 1, 2
// ↓
// 3, 4, 1, 2
// ↓
// 3, 1, 4, 2
// ↓
// 3, 1, 2, 4
// ↓
// 1, 3, 2, 4
// ↓
// 1, 2, 3, 4　←これが画面に表示される

$arr = [99, 3, 12, 45, 60, 100, 31, 7, 28];

// ここで並び替え処理
//直接並び変える？
//取り出す→別に代入して再代入
//繰り返し

for($i=0; $i<count($arr); $i++){  //大枠
    for($j=1; $j<count($arr); $j++){  //中枠
        if($arr[$j-1]>$arr[$j]){
            $x = $arr[$j]; //xに取り出す
            $arr[$j] = $arr[$j-1]; //空いたところにいれる
            $arr[$j-1] = $x;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>数字並び替えプログラム</title>
</head>
<body>
    <!-- ここに並び替え後を表示 -->
<?php
    for($x=0; $x<count($arr)-1; $x++){
        echo "{$arr[$x]},&nbsp;";
    }
    echo $arr[count($arr)-1];
    //もっとスマートにできそうではある

    echo "<br/>";

    //すこし変化
    $arr_asc = "";
    for($x=0; $x<count($arr)-1; $x++){
        $arr_asc .= "{$arr[$x]},\n";
    }
    $arr_asc .= $arr[count($arr)-1];
    echo $arr_asc;

    echo "<br/>";

    //最後に100を別でかくのが美しくない
    //2つ使う
    $arr_ASC ="";
    foreach($arr as $a => $b){
        $arr_ASC .= $b;
        if($a<count($arr)-1){
            $arr_ASC .= ",\n";
        }
    }
    echo $arr_ASC;

?>
</body>
</html>

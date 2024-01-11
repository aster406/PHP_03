﻿<?php
// 以下をfor文を使用して表示してください。

// 1
// 21
// 321
// 4321
// 54321
// 654321
// 7654321
// 87654321
// 987654321
//

//下記の変数を起点にして作るようにして下さい。
$input = 9;
for($x=$input-1; $x>=0; $x--){
    for($y=$input; $y>=$x+1 ;$y--){
        echo $y-$x;
    }
    echo "<br/>";
}


/*別パターン
for($i=1; $i<=$input; $i++){
    for($j=0; $j<=$i-1; $j++){
        echo $i-$j;
    }
    echo "<br/>";
}
*/

//パターン１の方
//$input=1のとき
//1-0=1($x=0)

//$input=2のとき
//2-1=1($x=1,$y=2)
//2-0=2($x=0,$y=2),2-1=1($x=0,$y=1)

//$input=3のとき
//3-2=1($x=2,$y=3)
//3-1=2($x=1,$y=3),2-1=1($x=1,$y=2)
//3-0=3($x=0,$y=3),2-0=2($x=0,$y=2),1-0=1($x=0,$y=1)



// ループ処理は何万回もの処理が繰り返される場合でも正常に機能する必要があるため
// 数字を直接記述するようなコードでは意味がありません。
// 下記のように変数を一箇所変えるだけで同じような規則性で動作するように実装して下さい。

//$input = 6;

// 1
// 21
// 321
// 4321
// 54321
// 654321
//




?>


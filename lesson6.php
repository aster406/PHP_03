<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];

//行の合計を示す。
$r_total = [
    'r1' => array_sum($arr['r1']),
    'r2' => array_sum($arr['r2']),
    'r3' => array_sum($arr['r3']),
];

/*
列の合計を示す。
array_column($◯, '◯')第１引数に配列、第２引数に要素のキー。
第２引数で指定した要素の配列ができる。
array_column($arr,'c1')の場合。
'r1' >= '10',
'r2' >= '7',
'r3' >= '25',
で配列ができる。
→
*/
$h='$arr[0]';
echo $h;

$c_total = [
    'c1' => array_sum(array_column($arr,'c1')),
    'c2' => array_sum(array_column($arr,'c2')),
    'c3' => array_sum(array_column($arr,'c3')),
];

//総計
$all_total = 0;
foreach($c_total as $total){
    $all_total=$all_total+$total;
}

/*
for($i=0; $i< count($c_total, COUNT_NORMAL); $i++){
    //直接指定しないとでない
    //echo $c_total['c1'];ではでた。
    //echo $c_total[0];ではでない。
    //echo $c_total['c1'];
    //echo $arr['r1'][1];
    //echo $arr['r1']['c1'];
    echo $c_total[$i];
 }
//下だと大丈夫。
 for($i=1; $i<= count($c_total, COUNT_NORMAL); $i++){
    echo $c_total["c{$i}"];
 }

//変数名を付けたほうが楽そう
 for($i=1; $i<= count($c_total, COUNT_NORMAL); $i++){
    $key="c$i";
    echo $c_total[$key];
 }

*/

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
    <!-- ここにテーブル表示 -->
<table>
    <!-- 一行目 
    <tr>
        <th></th>
        <th>c1</th>
        <th>c2</th>
        <th>c3</th>
        <th>横合計</th>
    </tr>
    -->
    <!-- 一行目もfor文に修正(横の柔軟性)-->
    <?php
        echo "<tr><th></th>";
            for($x=1; $x<=count($c_total);$x++){
            echo "<th>c{$x}</th>";
            }
        echo "<th>横合計</th></tr>";
    ?>

    <!-- 二～四行目 -->
    <?php
        /*
        //大枠の回数→中の回数と横合計
        for($i=1; $i<=count($arr); $i++){
            echo "<tr><td>r{$i}</td></tr>";
            //中
            for($j=1; $j<=count($arr["r{$i}"]); $j++){
                echo "<td>{$arr["r{$i}"]["c{$j}"]</td>";
            }
            //横合計
            echo "<td>{$r_total["r{$i}"]}</td>";
        }
        */
        //修正
        for($i=1; $i<=count($arr); $i++){
            $arr_key = "r{$i}";
            echo "<tr><td>{$arr_key}</td>";
            //中
            for($j=1; $j<=count($arr[$arr_key]); $j++){
                $c_key = "c{$j}";
                echo "<td>{$arr[$arr_key][$c_key]}</td>";
            }
            //横合計
            echo "<td>{$r_total[$arr_key]}</td></tr>";
        }
    //五行目
        echo "<tr><td>縦合計</td>";
        for($k=1; $k<=count($c_total);$k++){
            $c_key = "c{$k}";
            echo "<td>{$c_total[$c_key]}</td>";
        }
        //総計
        echo "<td>{$all_total}</td></tr>";
    ?>
    
</table>
</body>
</html>
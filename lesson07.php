<?php
$arr = [2, 9, 7, 5, 8, 1, 3, 4, 6];

echo "探索する数値を入力してください: ";
$target = trim(fgets(STDIN)); // ← ユーザー入力に変更

$count = 0;
$index = -1;

foreach ($arr as $i => $value) {
    $count++;
    if ($value == $target) { // 入力は文字列なので「==」で比較
        $index = $i;
        break;
    }
}

if ($index !== -1) {
    echo "探索回数" . $count . "回\n";
    echo "要素はインデックス " . $index . "にあります。\n";
} else {
    echo "要素は見つかりませんでした。\n";
}
?>
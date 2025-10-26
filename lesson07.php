<?php
$arr = [2, 9, 7, 5, 8, 1, 3, 4, 6];

echo "探索する数値を入力してください: ";
$target = trim(fgets(STDIN));

if (!is_numeric($target)) {
    echo "数値を入力してください。\n";
    exit;
}

$target = (int)$target;

$count = 0;
$index = -1;

foreach ($arr as $i => $value) {
    $count++;
    if ($value === $target) {
        $index = $i;
        break;
    }
}

if ($index !== -1) {
    echo "探索回数: {$count} 回\n";
    echo "要素 {$target} はインデックス {$index} にあります。\n";
} else {
    echo "探索回数: {$count} 回\n";
    echo "要素 {$target} は見つかりませんでした。\n";
}
?>

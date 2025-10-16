<?php

$arr = [2, 9, 7, 5, 8, 1, 3, 4, 6];

$target = 1;

$count = 0;
$index = -1;

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
    echo "探索回数" . $count . "回\n";
    echo "要素はインデックス " . $index . "にあります。\n";
} else {
    echo "要素は見つかりませんでした。\n";
}
?>
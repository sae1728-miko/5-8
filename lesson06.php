<?php

function selectionSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        [$arr[$i], $arr[$minIndex]] = [$arr[$minIndex], $arr[$i]];
    }
    return $arr;
}

function insertionSort($arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
    }
    return $arr;
}

function mergeSort($arr) {
    if (count($arr) <= 1) return $arr;

    $mid = floor(count($arr) / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] <= $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }
    return array_merge($result, $left, $right);
}

function quickSort($arr) {
    if (count($arr) <= 1) return $arr;

    $pivot = $arr[array_rand($arr)];
    $left = $right = [];

    foreach ($arr as $value) {
        if ($value < $pivot) {
            $left[] = $value;
        } elseif ($value > $pivot) {
            $right[] = $value;
        }
    }

    $equals = array_filter($arr, fn($v) => $v === $pivot);

    return array_merge(quickSort($left), $equals, quickSort($right));
}

$arr = [4, 5, 1, 3, 2, 9, 6, 8, 7];

echo "ソート方法を入力してください（SELECT / INSERT / MERGE / QUICK）： ";
$method = strtoupper(trim(fgets(STDIN)));

switch ($method) {
    case "SELECT":
        $sorted = selectionSort($arr);
        break;
    case "INSERT":
        $sorted = insertionSort($arr);
        break;
    case "MERGE":
        $sorted = mergeSort($arr);
        break;
    case "QUICK":
        $sorted = quickSort($arr);
        break;
    default:
        echo "無効なソート方法です。\n";
        exit;
}

echo "ソート結果: " . implode(", ", $sorted) . "\n";
?>


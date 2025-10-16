<?php
function selectioonSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        $temp = $arr[$i];
        $arr[$i] = $arr[$minIndex];
        $arr[$minIndex] = $temp;
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
    if (count($arr) <= 1) {
        return $arr;
    }
    $mid = floor(count($arr) / 2);
    $left = mergeSort(array_slice($arr, 0, $mid));
    $right = mergeSort(array_slice($arr, $mid));
    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    $i = $j = 0;
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }
    return array_merge($result, array_slice($left, $i), array_slice($right, $j));
}

function quickSort($arr) {
    if (count($arr) < 2) {
        return $arr;
    }
    $pivot = $arr[0];
    $left = $right = [];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $pivot) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }
    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

// ---------- メイン処理 ----------
$data = [4, 5, 1, 3, 2, 9, 6, 8, 7];

// コマンドライン引数を取得
if ($argc < 2) {
    echo "使用方法: php lesson06.php [SELECT|INSERT|MERGE|QUICK]\n";
    exit;
}
$method = strtoupper($argv[1]); // 入力を大文字に変換

switch ($method) {
    case "SELECT":
        $sorted = selectionSort($data);
        break;
    case "INSERT":
        $sorted = insertionSort($data);
        break;
    case "MERGE":
        $sorted = mergeSort($data);
        break;
    case "QUICK":
        $sorted = quickSort($data);
        break;
    default:
        echo "不明なソート方法です: $method\n";
        exit;
}

echo "元の配列: " . implode(", ", $data) . "\n";
echo "ソート方法: $method\n";
echo "ソート結果: " . implode(", ", $sorted) . "\n";
?>

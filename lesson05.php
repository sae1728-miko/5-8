<?php
$data = [5, 2, 7, 9, 8, 1, 3, 6, 4];

$round = 1;

for ($i = 0; $i < count($data) - 1; $i++) {
    for ($j = 0; $j < count($data) - 1 - $i; $j++) {
        if ($data[$j] > $data[$j + 1]) {
            $temp = $data[$j];
            $data[$j] = $data[$j + 1];
            $data[$j + 1] = $temp;

            echo "入れ替え" . $round . "回目\n";
            print_r($data);
            echo "\n";
            $round++;
        }
    }
}
?>

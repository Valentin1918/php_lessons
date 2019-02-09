<?php
require __DIR__ . '/LinkedList.php';
$n = 10000;
$data = [];

function quickRandom($length = 16)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}

for ( $i = 0; $i< $n; $i++) {
    $data[$i] = quickRandom(); // str random str_random Laravel
}
function hashFunction($row, $n) {
    $count = strlen($row);
    $result = 0;
    for($i = 0; $i < $count; $i++) {
        $result = $result + ord($row[$i]);
    }
    return $result % $n;
}
$hashTable = [
    0 => null,
    1 => null,
    2 => null,
    3 => null,
    4 => null,
    5 => null,
];
for ($i = 0; $i < count($data); $i++) {
    $index = hashFunction($data[$i], count($data));
//    echo $index.' '.$data[$i].PHP_EOL;
    if(empty($hashTable[$index])) {
        $hashTable[$index] = $data[$i];
        continue;
    }
    if ($hashTable[$index] instanceof LinkedList) {
        $hashTable[$index]->append($index, $data[$i]);
        continue;
    }
    $hashTable[$index] = new LinkedList();
    $hashTable[$index]->append($index, $data[$i]);
}

//var_export($hashTable);

$getElementByHash = function ($index) use (&$hashTable) {
    $element = $hashTable[$index];
    if(empty($element)) {
        throw new Exception('There is no such element!');
    }
    if ($element instanceof LinkedList) {
        try {
            return $element->search($index);
        } catch (Exception $e) {
            throw new Exception('There is no such element in linkedList!');
        }
    }
    return $element;
};

$index = hashFunction('lz95CSxlepswtZzQ', $n);
echo PHP_EOL.$index.PHP_EOL;
$result = $getElementByHash($index);
var_export($result);

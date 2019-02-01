<?php
require __DIR__ . '/LinkedList.php';
$n = 1000000000000000;
$data = [];
for ( $i = 0; $i< $n; $i++) {
    $data[$i] = ''; // str random str_random Laravel
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
    if(empty($hashTable[$index])) {
        $hashTable[$index] = $data[$i];
        continue;
    }
    if ($hashTable[$index] instanceof LinkedList) {
        // todo last item
        // todo link new item
        continue;
    }
    // todo convert simple value to Separate Object
    // todo insert into new linked list
}
echo json_encode($hashTable);
// todo get element by hash id
$index = hashFunction('ada', 5);
// find by index value in hash table
// todo check if value !exist => throw exception
// todo check if value is simple obj => return
// todo check if value is linked list
// todo linear search in this linked list
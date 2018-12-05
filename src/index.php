<?php
$taskNumber = 3;
for ($x = 1; $x <= $taskNumber; $x++) {
    echo "---task{$x}---<br>";
    include_once "./task_{$x}.php";
    echo "<br>";
}

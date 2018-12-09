<?php
function cashMachine($amount)
{
    if (!$amount || !is_int(intval($amount))) return null;
    $intAm = intval($amount);
    $cashTypes = [500, 200, 100, 50, 20, 10, 5, 2, 1];

    $cashCount = function ($carry, $item) use (&$intAm)
    {
        $intDiv = intdiv($intAm, $item);
        if ($intDiv) {
            $carry[$item] = $intDiv;
            $intAm -= $intDiv * $item;
        }
        return $carry;
    };

    return array_reduce($cashTypes, $cashCount, []);
}

$defaultAmount = 123;
$shortOptions = 'a:';
$longOptions = ['amount:'];
$amountCliVar = array_values(getopt($shortOptions, $longOptions))[0];
$amountCli = $amountCliVar ?: $argv[1];
if (!$amountCli) var_dump('Please specify an amount in CLI variable. Otherwise will be used a default one.');
$cashToDistribute = cashMachine($amountCli ?: $defaultAmount);
var_export($cashToDistribute);

<?php
function parseUrl($url)
{
    if (gettype($url) !== 'string' || !strlen($url)) return null;
    $point = '.';
    $parsedUrl = parse_url($url);
    ['host' => $host, 'path' => $path, 'query' => $query] = $parsedUrl;
    $hostParts = explode($point, $host);
    $subDomain = array_shift($hostParts);
    $domain = implode($point, $hostParts);
    array_shift($hostParts);
    $topLevelDomain = implode($point, $hostParts);
    $topLevelDomain = "$point$topLevelDomain";
    $varNames = ['subDomain', 'domain', 'topLevelDomain'];
    if ($path && (strlen($path) > 1 || $query)) {
        $resource = "$path$query";
        array_push($varNames, 'resource');
    }
    $pathParts = explode($point, $path);
    if ($pathParts[1]) {
        $fileExtension = "$point$pathParts[1]";
        array_push($varNames, 'fileExtension');
    }
    $additionalUrlParts = compact(...$varNames);
    return array_merge($parsedUrl, $additionalUrlParts);
}

$defaultUrl = 'http://www.google.com.ua/file.txt?usedId=123#somehash';
$shortOptions = 'u:';
$longOptions = ['url:'];
$urlCliVar = array_values(getopt($shortOptions, $longOptions))[0];
$urlCli = $urlCliVar ?: $argv[1];
if (!$urlCli) var_dump('Please specify an URl in CLI variable. Otherwise will be used a default one.');
$parsedUrl = parseUrl($urlCli ?: $defaultUrl);
var_export($parsedUrl);
/*
- scheme (http)
- host (www.google.com.ua)
- subdomain (www)
- domain (google.com.ua)
- top level domain (.com.ua)
- resource (/search?q=...)
- file suffix/extension (.html/.pdf)
- query string = query
- hash = fragment
 */

/* CLI variables:
http://php.net/manual/ru/reserved.variables.argv.php
http://php.net/manual/ru/reserved.variables.argc.php
http://php.net/manual/ru/function.getopt.php
 */

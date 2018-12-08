<?php
function parseUrl($url)
{
    echo $url;
    $parsedUrl = parse_url($url);
    ['scheme' => $scheme, 'host' => $host] = $parsedUrl;
    echo $scheme;
    $hostParts = explode('.', $host);
    $subdomain = $hostParts[0];
    $additionalUrlParts = compact('subdomain');
    return array_merge($parsedUrl, $additionalUrlParts);
}

$parsedUrl = parseUrl('http://www.google.com.ua/?usedId=123&file=trololo.txt'); //PHP_URL_QUERY
$parsedUrl2 = parseUrl('http://www.google.com.ua/file.txt'); //PHP_URL_QUERY
var_export($parsedUrl);
var_export($parsedUrl2);
/*
- scheme (http)
- host (www.google.com.ua)

- subdomain (www)
- domain (google.com.ua)
- top level domain (.com.ua)

- resource (/search?q=...)
- file suffix/extension (.html/.pdf)
- query string
- hash
 */

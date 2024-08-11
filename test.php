<?php

// Usage: php test.php --lang="javascript" --code="console.log('runs');"

$opts = getOpt('', ['lang::', 'code::']);

$ch = curl_init('http://localhost:3092');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'lang' => $opts['lang'] ?? '',
    'code' => $opts['code'] ?? '',
]));

$resp = curl_exec($ch);
curl_close($ch);

echo $resp;

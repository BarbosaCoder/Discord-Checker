<?php

error_reporting(0);


if (file_exists("cookie.txt")) {
    unlink("cookie.txt");
}


function getStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}


function multiexplode($string) {
    $delimiters = array("|", ";", ":", "/", "»", "«", ">", "<");
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}


$lista = $_GET['lista'];
$parts = multiexplode($lista);
$code = $parts[0]; 


$url = "https://discord.com/api/v9/entitlements/gift-codes/$code?with_application=true&with_subscription_plan=true";


$headers = array(
    'accept: */*',
    'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    'referer: https://discord.com/gifts/' . $code,
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36'
);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);


echo "Resposta da API: " . $response . "\n\n";


if ($httpcode == 404 || strpos($response, 'Unknown Gift Code') !== false) {
    echo "❌ Código de gift inválido.\n";
} elseif ($httpcode == 200) {
    echo "✅ Código de gift válido.\n";
} else {
    echo "⚠️ Código desconhecido, erro inesperado ou grande uso de verificação por usuarios:/. (HTTP $httpcode).\n";
}

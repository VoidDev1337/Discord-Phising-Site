<?php

$data = json_decode(file_get_contents('php://input'), true);

$login = $data['login'];
$password = $data['password'];
$undelete = $data['undelete'];
$captcha_key = $data['captcha_key'];
$login_source = $data['login_source'];
$gift_code_sku_id = $data['gift_code_sku_id'];

$url = "https://discord.com/api/v9/auth/login";

$payload = json_encode(array('login' => $login,
'password' => $password,
'undelete' => $undelete,
'captcha_key' => $captcha_key,
'login_source' => $login_source,
'gift_code_sku_id' => $gift_code_sku_id ) );

$request_headers = array(
    "Content-Type: application/json"
);
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
if (strpos($result, '{"token":') !== false) {
    // Send Token (Got token from API)
}

?>
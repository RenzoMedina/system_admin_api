<?php 

use Firebase\JWT\JWT;

function getToken(){
    $now = strtotime("now");
    $key = $_ENV['TOKEN'];
    $payload = [
        'exp'=>$now + 3600,
        'data'=> '1'
    ];
    $jwt = JWT::encode($payload, $key, 'HS256');
    return $jwt;
}
<?php 

use Firebase\JWT\JWT;

function getToken($key){
    $now = strtotime("now");
    $payload = [
        'exp'=>$now + 3600,
        'data'=> '1'
    ];
    $jwt = JWT::encode($payload, $key, 'HS256');
    return $jwt;
}

function validatedToken($token){

}
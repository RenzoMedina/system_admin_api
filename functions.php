<?php 

use Firebase\JWT\JWT;

function getToken($key, $data){
    $now = strtotime("now");
    $payload = [
        'exp'=>$now + 3600,
        'data'=> $data
    ];
    $jwt = JWT::encode($payload, $key, 'HS256');
    return $jwt;
}

function validatedToken($token){

}